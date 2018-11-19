if (window.layoutHelpers) {
  window.layoutHelpers.setAutoUpdate(true);
}

$(function() {
  $('#layout-sidenav').each(function() {
    new SideNav(this, {
      orientation: $(this).hasClass('sidenav-horizontal') ? 'horizontal' : 'vertical'
    });
  });

  $('body').on('click', '.layout-sidenav-toggle', function(e) {
    e.preventDefault();
    window.layoutHelpers.toggleCollapsed();
  });

  if ($('html').attr('dir') === 'rtl') {
    $('#layout-navbar .dropdown-menu').toggleClass('dropdown-menu-right');
  }
});
