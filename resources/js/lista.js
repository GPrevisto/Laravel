
$(function(){   
  //Salvar
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
      //console.log(plants);
        var d = $('#lista');
        d.append('<tr id="'+plants.id+'" ><td>'+ plants.name +' </td><td>'+plants.scientific_name+'</td><td>'+plants.description+'</td><td>'+ plants.isCarnivora +'</td><td><button id="delete" class="btn btn-primary" data-resource="'+plants.id+'"> D </button></td><td><button id="edit" class="btn btn-primary" data-resource="'+plants.id+'"> E </button></td></tr>');
        $("input[name='name']").val("");
        $("input[name='scientific_name']").val("");
        $("textarea[name='description']").val("");
        var isCarnivora = document.getElementById("isCarnivora");
        if (isCarnivora.checked){
          isCarnivora.checked = false;
        } 
       
      
    });
    // $.get('mostrar-nome/'+resource+'/'+id1,function(plants){
    // var plant =plants[0];
    // var id =plants[0];
    //   $("#1").text(plant.name);
    //   //console.log(id);
    //   console.log(plants);
    // })

    });//Fim Salvar

    //Deletar
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
       $("input[name='name']").val("");
       $("input[name='scientific_name']").val("");
       $("textarea[name='description']").val("");
       var isCarnivora = document.getElementById("isCarnivora");
       if (isCarnivora.checked){
         isCarnivora.checked = false;
       } 
    });
  
    });//Fim deletar

    //habilitar editar 
    $('#lista').on('click','#edit',function(event){
      var botao = $(event.target);
      var resource = $(botao).data("resource");
     // var resource = $(this).data("resource");
     // console.log('#'+resource);
    $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
   $.get('edit/'+resource,function(plants){
    if (!document.getElementById("#id")) {
      $("#form").append('<input type="text" hidden class="form-control" id="id" name="id" value="'+plants.id+'">');
    }   
    $("input[name='name']").val(plants.name);
    $("input[name='scientific_name']").val(plants.scientific_name);
    $("textarea[name='description']").val(plants.description);
    var isCarnivora = document.getElementById("isCarnivora");
        if (plants.isCarnivora){
          isCarnivora.checked = true;
        }else{
          isCarnivora.checked = false;
        }
        $("#Salvar").remove();
        if (!document.getElementById("#Alterar")) {
          $("#form").append(' <button  id="Alterar" class="btn btn-primary">Edit</button>');
        }
        if (!document.getElementById("Cancel")) {
          $("#form").append(' <button  id="Cancel" class="btn btn-danger">Calcel</button>');
        }
        // var d = $('#'+resource);
       console.log('#'+resource);
      //  d.closest('tr').fadeOut();
     //  d.remove();
    });

    });//Fim habilitar editar

    //Canecalr alteração
    $('#Calcel').on('click',function(e){
      e.preventDefault();
      console.log("oi");
      $("#Calcel").remove(); 
      $("#id").remove(); 
       $("input[name='name']").val("");
       $("input[name='scientific_name']").val("");
       $("textarea[name='description']").val("");
       var isCarnivora = document.getElementById("isCarnivora");
       if (isCarnivora.checked){
         isCarnivora.checked = false;
       } 
    });//Fim cancelar alteração

//Alterar
    $('#Alterar').on('click',function(e){
      e.preventDefault();
  $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    var id = $("input[name='id']").val();
    var name = $("input[name='name']").val();
    var scientific_name = $("input[name='scientific_name']").val();
    var description = $("textarea[name='description']").val();
    var isCarnivora = 0;
    $('input[name=isCarnivora]').each(function() {
      if ($(this).is(':checked'))
       isCarnivora = parseInt($(this).val());
  });
 $.post('alterar-lista',{id: id, name: name, scientific_name:scientific_name, description:description, isCarnivora:isCarnivora
},function(plants){
  //var plant =plants[0];
  if(plants.isCarnivora == 1){
      plants.isCarnivora ='Sim';
      }else{
          plants.isCarnivora=   'Não';
      }
   // $("#1").text(plants.name);
    //console.log(id);
    //console.log(plants);
      var d = $('#lista');
      d.append('<tr id="'+plants.id+'" ><td>'+ plants.name +' </td><td>'+plants.scientific_name+'</td><td>'+plants.description+'</td><td>'+ plants.isCarnivora +'</td><td><button id="delete" class="btn btn-primary" data-resource="'+plants.id+'"> D </button></td><td><button id="edit" class="btn btn-primary" data-resource="'+plants.id+'"> E </button></td></tr>');
      $("input[name='name']").val("");
      $("input[name='scientific_name']").val("");
      $("textarea[name='description']").val("");
      var isCarnivora = document.getElementById("isCarnivora");
      if (isCarnivora.checked){
        isCarnivora.checked = false;
      } 
     
    
  });
  // $.get('mostrar-nome/'+resource+'/'+id1,function(plants){
  // var plant =plants[0];
  // var id =plants[0];
  //   $("#1").text(plant.name);
  //   //console.log(id);
  //   console.log(plants);
  // })

  });//Fim Salvar


  });
  
  

  