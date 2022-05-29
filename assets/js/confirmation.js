$(document).ready(function(){
  
//########################################################################################//
// select the target element
$('.delete').click(function(){
   
    var el = this;
    var deleteid= $(this).data('id');
    //console.log(deleteid);
   // console.log(el);
   //attach a confirmation box
   bootbox.confirm('Are you sure you want to delete the student record?', function(result){
       if(result){
           $.ajax({
               url: "./controller/student_logic.php",
               type: "POST",
               data: {id:deleteid},
               success: function(response){

                if (response==1){
                    $(el).closest('tr').css('background', 'tomato'),
                    $(el).closest('tr').fadeOut(600, function(){
                        $(this).remove();
                        //location.reload();
                       })                     
                     }
                 }
                        })
       }
   })


 
    

})
//########################################################################################//

 //########################################################################################//

 //########################################################################################//
// score delete block

// select the target element
$('.delete-score').click(function(e){
   // console.log("hello");
    e.preventDefault();
    var el = this;
    var deleteid= $(this).data('id');
    //console.log(deleteid);
   // console.log(el);
   //attach a confirmation box
   bootbox.confirm('Are you sure you want to delete the student score for this subject?', function(result){
       if(result){
           $.ajax({
               url: "./controller/score_upload_logic.php",
               type: "POST",
               data: {id:deleteid},
               success: function(response){

                if (response==1){
                    $(el).closest('tr').css('background', 'tomato'),
                    $(el).closest('tr').fadeOut(600, function(){
                        $(this).remove();
                       })
                     
                }
                

               }
              
           })
       }
   })
})
//########################################################################################//

 //########################################################################################//
// fees edit billing scripts


 //########################################################################################//

})