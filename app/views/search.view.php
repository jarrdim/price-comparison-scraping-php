<?php $this->view('header') ?>

<style>
    form{
        margin:auto;
        width:500px;
        text-align:center;
        font-family:tahoma;
        border-radius:10px;
        box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
    }
</style>


<div class="container  mt-5  ">
   
    <form >
        <div class="row">
            <div class="col-md-12 ">
                <div class="card w-100 ">
                    <div class="card-body text-start">
                        <div class="card-title text-primary fw-bold">
                           ENTER YOUR CONTACT DETAILS
                        </div>
                        <div class="card-text ">
                             <input  oninput="look(this.value);"  placeholder="Enter something to search" class="form-control mb-3 ">  
                        </div>
                        <div class="px-2 result">
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
  
</div>

<script>
function look(value)
{
    if (!value) {
        var resultDiv = document.querySelector(".result");
        resultDiv.innerHTML = ''; // empty the div element when value is empty
        return;
    }

    var xml = new  XMLHttpRequest();
    var form = new FormData();
  
    form.append('text', value);
    
   

    xml.addEventListener('readystatechange', function () {

        if (xml.readyState == 4) {
            if (xml.status == 200) {
                handle_result(xml.responseText)
 
            }

        }
    });



    xml.open('post','<?php echo ROOT ?>/search',true);
    xml.send(form);

}
function handle_result(result)
{
   
    var obj = JSON.parse(result);
    if(typeof obj == "object")
    {
        
        var result = document.querySelector(".result");
         result.innerHTML = ''; 


       for (let index = 0; index < obj.length; index++) {
        const element = obj[index];
        var nn = document.createElement("div");
        nn.style.color="gold";
        nn.innerHTML="Email: "+ obj[index].email + " PHONE: " + obj[index].phone;
       
        result.appendChild(nn);
        
       }
        
        
    }
 
}


</script>