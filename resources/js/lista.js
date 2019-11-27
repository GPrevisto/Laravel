
$(function(){   
    $('#Salvar').on('click',function(e){
        e.preventDefault();

    $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
      
      var name = $("input[name='name']").val();
      var scientific_name = $("input[name='scientific_name']").val();
      
      var description = $("textarea[name='description']").val();
      var isCarnivora = 0;
      $('input[name=isCarnivora]').each(function() {
        if ($(this).is(':checked'))
         isCarnivora = parseInt($(this).val());
    });
   $.post('mostrar-lista',{name: name,scientific_name:scientific_name,description:description,isCarnivora:isCarnivora
  },function(plants){
    //var plant =plants[0];
    if(plants.isCarnivora == 1){
        plants.isCarnivora ='Sim';
        }else{
            plants.isCarnivora=   'Não';
        }
     // $("#1").text(plants.name);
      //console.log(id);
      console.log(plants);
        var d = $('#lista');
        d.append('<tr><td>'+ plants.name +' </td><td>'+plants.scientific_name+'</td><td>'+plants.description+'</td><td>'+ plants.isCarnivora +'</td><td><a href="delete/'+plants.id+'"> D </a></td><td><a href="/edit/'+plants.id+'"> E </a></td></tr>');

    });

    // $.get('mostrar-nome/'+resource+'/'+id1,function(plants){
    // var plant =plants[0];
    // var id =plants[0];
    //   $("#1").text(plant.name);
    //   //console.log(id);
    //   console.log(plants);
    // })

    });

    $('#delete').on('click',function(){
      var resource = $(this).data("resource");
    
    $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
      
   $.get('delete/'+resource,function(plants){

      console.log(plants);
        var d = $('#lista');
        d.append('<tr><td>'+ plants.name +' </td><td>'+plants.scientific_name+'</td><td>'+plants.description+'</td><td>'+ plants.isCarnivora +'</td><td><a href="delete/'+plants.id+'"> D </a></td><td><a href="/edit/'+plants.id+'"> E </a></td></tr>');

    });

    });



  });
  

  