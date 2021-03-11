var listItem = [];
showItem = document.getElementById("item");
var idItem = 1, btnid = 1;


//call ajax get data
function getApi(){
    var url = "http://localhost:8082/Api/indexApi.php"
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function(){
        if(this.readyState=4 && this.status == 200){
            var myArr = JSON.parse(this.responseText)
            getData(myArr['data']);
            console.log(myArr)
        }
    };
    xhttp.open("GET",url,true);
    xhttp.send();
    
}
getApi()
function getData(arr){
    var out="";
    var i;
    for(i=0;i < arr.length; i++){
        if(arr[i].flagStatus === '1'){
            out += '<div id="' + arr[i].intId +'"  class = "list-item--01">'+ 
            '<div class="item-content">' + 
                '<p>' + arr[i].strTitle + '</p>'+
            '</div>'  +
            '<div class="btn-item" id="haha">' + 
                '<input type="button" id="item-'+ idItem++ +'" value="Delete" onclick="deleteItem()" class="btn-item--del"/>' + 
                ' <input type="button" id="'+ arr[i].flagStatus+'"  onclick="changeStatus(this.id)" value="Done" class="btn-item--done "/>'+
            '</div>' +
        '</div>'
        }else{
            out += '<div id="' + arr[i].intId +'"  class = "list-item--01">'+ 
            '<div class="item-content">' + 
                '<p>' + arr[i].strTitle + '</p>'+
            '</div>'  +
            '<div class="btn-item" id="haha">' + 
                '<input type="button" id="item-'+ idItem++ +'" value="Delete" onclick="deleteItem()" class="btn-item--del"/>' + 
                ' <input type="button" id="'+ arr[i].flagStatus+'"  onclick="changeStatus(this.id)" value="Undone" class="btn-item--done "/>'+
            '</div>' +
        '</div>'
        }
       
    }
    document.getElementById("item").innerHTML = out
}
//post
    function addItem1(){
    var content = document.getElementById("addItem").value
    if(content===""){
        alert("Must not empty!")
    }else{
        postData(content)
       location.reload();
    }
}
function postData(value){
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
           var res = JSON.parse(this.responseText);
           console.log(res);
            getData(res['data'])
        }
      };
    xhttp.open("POST", "http://localhost:8082/Api/postApi.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("strTitle="+value);
}



function changeStatus(idbtn){
    itemId = event.target.parentNode.parentNode.id;
    value =  document.getElementById(idbtn).value   
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var res = this.responseText
            console.log(res);
            
        }
        };
        xhttp.open("POST", "http://localhost:8082/Api/changeStatusApi.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("intId="+itemId);
        location.reload();
}







function deleteItem(){
    conf = confirm("Are you sure delete this item?")
    if(conf){
        itemDel = event.target.parentNode.parentNode.id 
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
           location.reload();
            }
          };
        xhttp.open("POST", "http://localhost:8082/Api/deleteApi.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("intId="+itemDel);
    }
}
