$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
})


var BaseRecord=(function() {

return {

swalTitle: '',
confirmButtonText: '',
cancelButtonText: '',
errorAjax: '',

spin:function() {
   $('#spinner').html('<span class="fa fa-spinner fa-pulse fa-3x fa-fw"></span>');
},

unSpin:function() {
   $('#spinner').empty();
},

typeSelect: function(that, url, errorAjax) {
   //alert(that);
   var ajaxSetting={
      method: 'get',
      url: url,
      data: {
         type: that,	
      },
      success: function(data) {
      	 //alert(data);
         $("#pannel").html(data.table);
         $('.listbuttonremove').click(function () {
            BaseRecord.destroy($(this), url, BaseRecord.swalTitle, BaseRecord.confirmButtonText, BaseRecord.cancelButtonText, BaseRecord.errorAjax);
            return false;
         });         
      },
      error: function(data) {
         swal({
            title: errorAjax,
            type: 'warning'
         });
      },
   };
   $.ajax(ajaxSetting);
},

destroy: function(that, url, swalTitle, confirmButtonText, cancelButtonText, errorAjax) {
   this.swalTitle = swalTitle;
   this.confirmButtonText = confirmButtonText;
   this.cancelButtonText = cancelButtonText;
   this.errorAjax = errorAjax;         
   swal({
        title: swalTitle,
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: '#DD6B55',
        confirmButtonText: confirmButtonText,
        cancelButtonText: cancelButtonText
    })
    .then(function () {
        BaseRecord.ajax($(that).attr('href'), url, errorAjax)
    });
},  

ajax: function(verb, url, errorAjax) {
   this.spin();
   var ajaxSetting = {
      method: 'DELETE',
      url: verb,
      success: function(data) {
         //alert(data);
         BaseRecord.unSpin();
         BaseRecord.typeSelect(0, url, errorAjax); //ОБНОВЛЕНИЕ СТРАНИЦЫ
      },
      error: function(data) {
         //alert(data.responseText);
         BaseRecord.unSpin();
         swal({
            title: errorAjax,
            type: 'warning'
         })
      },
   };
   $.ajax(ajaxSetting);   
},

userdestroy: function(swalTitle, confirmButtonText, cancelButtonText) {
   swal({
        title: swalTitle,
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: '#DD6B55',
        confirmButtonText: confirmButtonText,
        cancelButtonText: cancelButtonText
    })
    .then(function () {
        form_destroy.submit();
    });
},

}

})();