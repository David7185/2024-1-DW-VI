var activeNavItem = $('.nav-link');
var activeNavLink = $('.link');
var path = window.location.href; 

 activeNavItem.each(function() {
   
  if(this.href == path) {
      activeNavItem.removeClass('active');
      $(this).addClass('active');  
  }
 
 });
 $('.eliminar').on('click',function(){
    const url = $(this).data('href');
    console.log(url);
   Swal.fire({
     title: 'Seguro que desea eliminar este registro?',
     showDenyButton: true,
     showCancelButton: true,
     confirmButtonText: `Si`,
     denyButtonText: `No`,
     cancelButtonText: `Cancelar`,
     }).then((result) => {
     if (result.isConfirmed) {
         fetch(url,{method: 'POST'}).
         then(data=>{
            console.log(data);

            return data.json()}).
         then((data) => {
             console.log(data);
             if(data.ok){
                 Swal.fire('Eliminado!', data.msg, 'success')
                 location.reload();
            }else{
                 Swal.fire('Error!', data.msg, 'error')
             }
         })
     } else if (result.isDenied) {
         Swal.fire('Changes are not saved', '', 'info')
     }
     })
})
$('.reingresar').on('click',function(){
    const url = $(this).data('href');
   Swal.fire({
     title: 'Seguro que desea reingresar este registro?',
     showDenyButton: true,
     showCancelButton: true,
     confirmButtonText: `Si`,
     denyButtonText: `No`,
     cancelButtonText: `Cancelar`,
     }).then((result) => {
     if (result.isConfirmed) {
         fetch(url,{method: 'POST'}).
         then(data=>data.json()).
         then((data) => {
             console.log(data);
             if(data.ok){
                 Swal.fire('reingresado!', data.msg, 'success')
                 location.reload();
            }else{
                 Swal.fire('Error!', data.msg, 'error')
             }
         })
     } else if (result.isDenied) {
         Swal.fire('Changes are not saved', '', 'info')
     }
     })
})