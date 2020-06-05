/*AUTHOR: MATEUS CARVALHO
* VERSION: 1.0
* */
const AjaxRequest = function(url, options, callback){
    const method = options.method || 'GET';
    const xhttp = new XMLHttpRequest();
    const data = options.data || null;
    const headers = options.headers || false;
    xhttp.overrideMimeType("application/json");

    if(headers != false){
        for(let header in headers){
            xhttp.setRequestHeader(header, headers['header']);
        }
    }

    xhttp.onreadystatechange = function(){
        if(this.readyState == 3 && this.status ==200){
            document.getElementsByClassName("loadingbox")[0].style.display = 'block';
            console.log("Processando...");
        }
        if(this.readyState == 4 && this.status == 200){
            callback(JSON.parse(this.responseText));
        }else if(this.readyState == 4 && this.status == 400){
            callback(JSON.parse(this.responseText));
        }else if(this.readyState == 4 && this.status == 503){
            console.log(this.responseText);
            callback({'errors': {'message': 'Erro Interno tente novamente mais tarde!'}});
        }
    };
    xhttp.open(method, url, true);

    /*"fname=Henry&lname=Ford"*/
    xhttp.send(data);
}

//primise
//url or file
const MakePromise = function(url, options={}){
    return new Promise(function(resolve, reject){
        AjaxRequest(url, options, function(contents){
            if(contents){
                resolve(contents);
            }else{
                reject(contents);
            }
        })
    });
}

//simple request return primise
const makeSimplePromise = function(url, options){
    /*
  method: 'GET',
  headers: myHeaders,
  mode: 'cors',
  cache: 'default'
  */
    return window.fetch(url, options)
        .then(function(data){
            return data.json();
        }).catch(function(err){
            return err
        })
}




