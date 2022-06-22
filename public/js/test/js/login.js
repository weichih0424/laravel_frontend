$.ajaxSetup({
  headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
// alert("123");

// function login() {



$(".btn").click(function(e){
  e.preventDefault();
  alert("123");
  let id = $('#log-id').val();
  let pwd = $('#log-pwd').val();
  // let r = /\S/;
  $('#real-btn').attr("disabled", true);
  $.ajax({
    type: "POST",
    // url: "{{ route('ajaxRequest.post') }}",
    url: "/test",
    data: {
      logId: id,
      logPwd: pwd,
    },
    success: function(data,response){
      alert(data.success);
      console.log(response)
      // if(data){
      // alert("YES");
    // }
    },
    error: function(jqXHR){
      console.log('login_ERR: ' + jqXHR.status + ' -- ' + jqXHR.statusText);
      alert("NO");
    }
  })
})
