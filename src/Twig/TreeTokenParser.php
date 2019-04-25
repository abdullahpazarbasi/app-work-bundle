<?php
/**
 * Copyright (c) 2018.
 */
/**
 * User: abdullah
 * Date: 30.11.2018
 * Time: 10:03
 */
namespace AppWorkBundle\Twig;

use Twig\TokenParser\AbstractTokenParser;

/**
 * Class TreeTokenParser
 */
class TreeTokenParser extends AbstractTokenParser
{
    
    /**
{% tree key, item in items as treeA %}
    {% if treeloop.first %}<ul>{% endif %}
        <li>
            {{ key }} &gt; {{ item.name }}
            {{ treeloop.index0 }}
            {{ treeloop.index }}
            {{ treeloop.level0 }}
            {{ treeloop.level }}
            {{ treeloop.revindex0 }}
            {{ treeloop.revindex }}
            {{ treeloop.length }}
            {% subtree item.children with treeA %}
        </li>
    {% if treeloop.last %}</ul>{% endif %}
{% endtree %}
     *
     * @param \Twig_Token $oToken
     * @throws \Twig_Error_Syntax
     * @return TreeNode
     */
    public function parse(\Twig_Token $oToken): TreeNode
    {
        $iLineNo = $oToken->getLine();
        $oTokenStream = $this->parser->getStream();
        // key, item in items
        $oTargets = $this->parser->getExpressionParser()->parseAssignmentExpression();
        $oTokenStream->expect(\Twig_Token::OPERATOR_TYPE, 'in');
        $oSequence = $this->parser->getExpressionParser()->parseExpression();
        // as tree1
        $sAs = 'default';
        if ($oTokenStream->nextIf(\Twig_Token::NAME_TYPE, 'as')) {
            $sAs = $oTokenStream->expect(\Twig_Token::NAME_TYPE)->getValue();
        }
        // %}
        $oTokenStream->expect(\Twig_Token::BLOCK_END_TYPE);
        $aData = [];
        while (TRUE) {
            // backing up tag content
            $aData[] = [
                'type' => 'body',
                'node' => $this->parser->subparse(function (\Twig_Token $oTokken) {
                    return $oTokken->test(['subtree', 'endtree']);
                }),
            ];
            // {% subtree
            if ($oTokenStream->next()->getValue() == 'subtree') {
                // item
                $oChild = $this->parser->getExpressionParser()->parseExpression();
                // with tree1
                $sWith = $sAs;
                if ($oTokenStream->nextIf(\Twig_Token::NAME_TYPE, 'with')) {
                    $sWith = $oTokenStream->expect(\Twig_Token::NAME_TYPE)->getValue();
                }
                // %}
                $oTokenStream->expect(\Twig_Token::BLOCK_END_TYPE);
                // backing up subtree details
                $aData[] = [
                    'type' => 'subtree',
                    'with' => $sWith,
                    'child' => $oChild,
                ];
                // {% endtree
            }
            else {
                // %}
                $oTokenStream->expect(\Twig_Token::BLOCK_END_TYPE);
                break;
            }
        }
        // key, item
        if (count($oTargets) > 1) {
            $oKeyTarget = $oTargets->getNode(0);
            $oKeyTarget = new \Twig_Node_Expression_AssignName($oKeyTarget->getAttribute('name'), $oKeyTarget->getLine());
            $oValueTarget = $oTargets->getNode(1);
            $oValueTarget = new \Twig_Node_Expression_AssignName($oValueTarget->getAttribute('name'), $oValueTarget->getLine());
        }
        // (implicit _key,) item
        else {
            $oKeyTarget = new \Twig_Node_Expression_AssignName('_key', $iLineNo);
            $oValueTarget = $oTargets->getNode(0);
            $oValueTarget = new \Twig_Node_Expression_AssignName($oValueTarget->getAttribute('name'), $oValueTarget->getLine());
        }
        return new TreeNode($oKeyTarget, $oValueTarget, $oSequence, $sAs, $aData, $iLineNo, $this->getTag());
    }
    
    /**
     * {% tree
     *
     * @return string
     */
    public function getTag(): string
    {
        return 'tree';
    }
    
}