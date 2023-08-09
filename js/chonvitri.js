$(document).ready(function() {

    $('#phong').on('change', function() {
        var phong_id = $(this).val();
        // console.log(phong_id);
        if (phong_id){
            // If a province is selected, fetch the phongs for that province using AJAX
            $.ajax({
                url: 'ajax_get_phong.php',
                method: 'GET',
                dataType: "json",
                data: {
                    phong_id: phong_id
                },
                success: function(data) {
                    // Clear the current options in the "phong" select box
                    $('#giasach').empty();
                
                    // Add the new options for the phongs for the selected province
                    $.each(data, function(i, giasach) {
                        // console.log(phong);
                        $('#giasach').append($('<option>', {
                        value: giasach.id,
                        text: giasach.name
                        }));
                    });
                    // Clear the options in the "vitri" select box
                    $('#vitri').empty();
                },
                error: function(xhr, textStatus, errorThrown) {
                console.log('Error: ' + errorThrown);
                }
            });
            $('#vitri').empty();
        } else {
        // If no province is selected, clear the options in the "phong" and "vitri" select boxes
        $('#giasach').empty();
        }
    });
    
    $('#giasach').on('change', function() {
      var giasach_id = $(this).val();
      // console.log(giasach_id);
      if (giasach_id) {
      // If a giasach is selected, fetch the awards for that giasach using AJAX
      $.ajax({
          url: 'ajax_get_giasach.php',
          method: 'GET',
          dataType: "json",
          data: {
          giasach_id: giasach_id
          },
          success: function(data) {
          // console.log(data);
          // Clear the current options in the "wards" select box
          $('#vitri').empty();
          // Add the new options for the avitri for the selected giasach
          $.each(data, function(i, vitri) {
              $('#vitri').append($('<option>', {
              value: vitri.id,
              text: vitri.name
              }));
          });
          }, 
          error: function(xhr, textStatus, errorThrown) {
          console.log('Error: ' + errorThrown);
          }
      });
      } else {
      // If no giasach is selected, clear the options in the "award" select box
      $('#vitri').empty();
      }
    });
    });
    