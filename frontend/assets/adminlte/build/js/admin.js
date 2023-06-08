$( document ).ready(function () {
  $('.nav-sidebar a').each(function () {
    let location = window.location.protocol + '//' + window.location.host + window.location.pathname;
    let link = this.href;
    console.log(location);
    if (link === location || location === '/') {
      $('.nav-sidebar a').removeClass('active');
      $(this).closest('a').addClass('active');
      $(this).parents('.nav-treeview').eq(1).find('li a.nav-link').eq(0).addClass('active');
      let pars = $(this).parents('.nav-item');
      pars.eq(pars.length-1).children('a').addClass('active');
      return true;
    }
  })
});
