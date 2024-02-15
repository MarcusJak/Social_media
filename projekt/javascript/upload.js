const input= document.getElementById('imageSearch');
//sätter knappar samt inputs onsynliga
document.getElementById("upload").style.display = "none"; 
document.getElementById("inputImage").style.display = "none"; 
document.getElementById("selectFile").style.display = "none"; 
document.getElementById("selectWebb").style.display = "none"; 
document.getElementById("selectLokal").style.display = "none"; 
document.getElementById("searchWebb").style.display = "none"; 




var programInfo = new XMLHttpRequest();




//denna funktion gör själva requesten för API
function loadImg(){
removeImages();
const url='https://api.unsplash.com/search/photos/?query='+input.value+'&per_page=9&client_id='+'rjGcBxWuQke5XguwYWVFk2eFBgCVAYvHgxmWW88w6NM';

    programInfo.open("GET",url, true);
    programInfo.send();


}

//tar emot API samt lägger in det till hemsidan 
programInfo.onreadystatechange = function() {
    if (programInfo.readyState == XMLHttpRequest.DONE&&this.status==200 ) 
    {
        removeImages();
        var jsonData = JSON.parse( programInfo.response);
        const imageNodes=[];
        for(let i =0;i<jsonData.results.length;i++)
        {
            
            document.getElementById('searchImage').innerHTML+=
            '<div id=img_div><img src='+jsonData.results[i].urls.raw+
            '><form method="POST" action="includes/postFunk.php?varname='+jsonData.results[i].urls.raw+'&text='+
            document.getElementById('image_text').value+
            '" enctype="multipart/form-data"><button type="submit" class="uploadButtons id="submit" name="webbImage">Select</button></form></div>'

        }
       
    }
};




//tar bort allt i diven
function removeImages(){
    document.getElementById('searchImage').innerHTML='';
}


//ändrar utseendet 
document.getElementById("submit").addEventListener("click", function(){
   
    document.getElementById("submit").style.display = "none"; 
    document.getElementById("text").style.display = "none"; 
    document.getElementById("selectWebb").style.display = "block"; 
    document.getElementById("selectLokal").style.display = "block"; 

})


//ändrar utseendet 
document.getElementById("selectWebb").addEventListener("click", function(){
    document.getElementById("searchWebb").style.display = "block "; 

    document.getElementById("inputImage").style.display = "block"; 

    document.getElementById("selectWebb").style.display = "none"; 
    document.getElementById("selectLokal").style.display = "block"; 

    document.getElementById("upload").style.display = "none"; 
    document.getElementById("selectFile").style.display = "none"; 


})


//ändrar utseendet 
document.getElementById("selectLokal").addEventListener("click", function(){
    document.getElementById("searchWebb").style.display = "none "; 

    document.getElementById("upload").style.display = "block"; 
    document.getElementById("selectFile").style.display = "block"; 

    document.getElementById("selectWebb").style.display = "block"; 
    document.getElementById("selectLokal").style.display = "none"; 
    document.getElementById("inputImage").style.display = "none"; 

})


//kallar på loadImg funktionen som hämtar in bilderna
document.getElementById("searchWebb").addEventListener("click", function(){

    loadImg();

})



