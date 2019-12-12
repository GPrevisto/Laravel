
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
        d.append('<tr id="'+plants.id+'" ><td>'+ plants.name +' </td><td>'+plants.scientific_name+'</td><td>'+plants.description+'</td><td>'+ plants.isCarnivora +'</td><td><button id="delete" class="btn btn-primary" data-resource="'+plants.id+'"> D </button></td><td><button id="edit" class="btn btn-primary" data-resource="'+plants.id+'"> E </button></td></tr>');

    });
    // $.get('mostrar-nome/'+resource+'/'+id1,function(plants){
    // var plant =plants[0];
    // var id =plants[0];
    //   $("#1").text(plant.name);
    //   //console.log(id);
    //   console.log(plants);
    // })

    });

    $('#lista').on('click','#delete',function(event){
      var botao = $(event.target);
      var resource = $(botao).data("resource");
     // var resource = $(this).data("resource");
      console.log('#'+resource);
    $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
   $.get('delete/'+resource,function(){
        var d = $('#'+resource);
        console.log('#'+resource);
      //  d.closest('tr').fadeOut();
       d.remove();  	
    });
  
    });

    $('#lista').on('click','#edit',function(event){
      var botao = $(event.target);
      var resource = $(botao).data("resource");
     // var resource = $(this).data("resource");
      console.log('#'+resource);
    $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
   $.get('edit/'+resource,function(plants){
    $("input[name='name']").val(plants.name);
    $("input[name='scientific_name']").val(plants.scientific_name);
    $("textarea[name='description']").val(plants.description);
    if($(plants.isCarnivora){
      $("input[name='isCarnivora']").
    }
    
       // var d = $('#'+resource);
        console.log('#'+resource);
      //  d.closest('tr').fadeOut();
     //  d.remove();  	
    });
  
    });
  });
  
  

  