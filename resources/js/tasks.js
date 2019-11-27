
$(function(){
  $('.test').on('click',function(){
    var resource = $(this).data("resource");
     var id1 = $(this).data("id");
  //console.log(id1);
  $(this).text("Carregando...");
 
  $.get('mostrar-nome/'+resource+'/'+id1,function(plants){
  var plant =plants[0];
  var id =plants[0];
    $("#"+id).text(plant.name);
    //console.log(id);
    console.log(plants);
  })
rr

  });
});

