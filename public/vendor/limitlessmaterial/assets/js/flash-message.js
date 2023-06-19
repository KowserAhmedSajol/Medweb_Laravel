//plugin

if (typeof swal != 'undefined') 
{
  swalInit = swal.mixin({
    buttonsStyling      : false,
    confirmButtonClass  : 'btn btn-primary',
    cancelButtonClass   : 'btn btn-light'
  });
}

if (typeof Noty != 'undefined') 
{
  Noty.overrideDefaults({
    theme     : 'limitless',
    layout    : 'bottomRight',  
    type      : 'alert',
    timeout   : 2500
  });
}



function pl_swal(msg , type = 'error')
{
    swalInit.fire({
        title   : msg,
        type    : type
    });
}

function pl_toast(msg , type = 'danger')
{
    theme = '';

    switch(type) 
    {
        case 'primary':
            theme = ' alert alert-primary alert-styled-left alert-arrow-left p-0 bg-white';
          break;
        case 'secondary':
            theme = ' alert alert-secondary alert-styled-left alert-arrow-left p-0 bg-white';
          break;
        case 'success':
            theme = ' alert alert-success alert-styled-left alert-arrow-left p-0 bg-white';
          break;
        case 'danger':
            theme = ' alert alert-danger alert-styled-left alert-arrow-left p-0 bg-white';
          break;
        case 'warning':
            theme = ' alert alert-warning alert-styled-left alert-arrow-left p-0 bg-white';
          break;
        case 'info':
            theme = ' alert alert-info alert-styled-left alert-arrow-left p-0 bg-white';
          break;
        case 'light':
            theme = ' alert alert-light alert-styled-left alert-arrow-left p-0 bg-white';
          break;
        case 'dark':
            theme = ' alert alert-dark alert-styled-left alert-arrow-left p-0 bg-white';
          break;
        default:
            theme = ' alert alert-info alert-styled-left alert-arrow-left p-0 bg-white';
    }

    new Noty({
      theme         : `${theme}`,
      text          : msg,
      type          : type,
      progressBar   : true,
      closeWith     : ['button'],
  }).show();

}





// Swal.fire({
//   toast: true,
//   icon: 'success',
//   title: 'Posted successfully',
//   animation: true,
//   position: 'bottom-right',
//   showConfirmButton: false,
//   timer: 3000,
//   timerProgressBar: true,
//   didOpen: (toast) => {
//       toast.addEventListener('mouseenter', Swal.stopTimer)
//       toast.addEventListener('mouseleave', Swal.resumeTimer)
//   }
// })