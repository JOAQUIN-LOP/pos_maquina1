$(document).ready(function(){
    $("#CodProducto").select2({
        language: {
    
            noResults: function() {
    
              return "No hay resultado";        
            }
        }
    });
    $("#SelectAnio").select2({
        language: {
    
            noResults: function() {
    
              return "No hay resultado";        
            }
        }
    });
    $("#Empresa").select2({
        language: {
    
            noResults: function() {
    
              return "No hay resultado";        
            }
        }
    });
    
    $("#mes").select2({
        language: {
    
            noResults: function() {
    
              return "No hay resultado";        
            }
        }
    });
});