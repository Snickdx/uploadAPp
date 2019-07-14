//let server = "https://ba0a92b556de4033bb81b78cc5537931.vfs.cloud9.us-west-2.amazonaws.com";
const server ="http://localhost/uploadApp"; 

let interval;

function startTimer(){
   let time = 5;//5 secs
   let interval = setInterval(function(){
     time--;
     if(time === 0){
       document.querySelector("#counter").innerHTML = `Refreshing`;
       refresh();
       time = 5;
     }else{
       document.querySelector("#counter").innerHTML = `Refreshing in ${time} seconds`;
     }
   }, 1000);
   return interval;
}

async function refresh(){
  console.log('refreshing');
    let resp = await fetch(`${server}/state.json`);
    if(resp.status === 200){
      let state = await resp.json();
      console.log(state);
      document.getElementById("result").innerHTML = state.num_uploads + " Files Uploaded"
    }
}

function getSearchParameters() {
  var prmstr = window.location.search.substr(1);
  return prmstr != null && prmstr != "" ? transformToAssocArray(prmstr) : {};
}

function transformToAssocArray( prmstr ) {
    var params = {};
    var prmarr = prmstr.split("&");
    for ( var i = 0; i < prmarr.length; i++) {
        var tmparr = prmarr[i].split("=");
        params[tmparr[0]] = tmparr[1];
    }
    return params;
}



function toggle(event){
    console.log("switching state to", event.checked);
    if(event.checked){
        console.log('Starting Timer');
        interval = startTimer();
    }else{
        console.log('Stopping Timer');
        document.querySelector("#counter").innerHTML = "";
        clearInterval(interval);
    }

}

function main(){
    var params = getSearchParameters();
    if('reload' in params && params.reload === 'true'){
        console.log('reload enabled');
        document.querySelector('#toggleBtn').checked = true;
        interval = startTimer();
    }
}
 

main();