<?php
if ( $_SERVER['REQUEST_METHOD']=='GET' && realpath(__FILE__) == realpath( $_SERVER['SCRIPT_FILENAME'] ) ) {
header( 'HTTP/1.0 403 Forbidden', TRUE, 403 );
die ("<h2>Access Denied!</h2> This file is protected and not available to public.");
}
?>

<style>
.christmas-lights li {
    --christmas-lights-1: #057d70; /*color - 1*/
    --christmas-lights-2: #d41a21; /*color - 2*/
    --christmas-lights-3: #ffd27c; /*color - 3*/
    animation-duration: 2s;
    animation-fill-mode: both;
    animation-iteration-count: infinite;
    animation-name: flash-1;
    border-radius: 50%;
    display: inline-block;
    height: 20px;
    margin: 25px 20px;
    position: relative;
    width: 20px;
}
  
.christmas-lights {
    left: 0;
    margin: 0;
    pointer-events: none;
    position: fixed;
    right: 0;
    top: -15px;
    white-space: nowrap;
    width: 100%;
    z-index: 100;
}
  
.christmas-lights[data-position="bottom"] {
    top: auto;
    bottom: -15px;
    transform:scale(-1)
}
  
.christmas-lights[data-position="right"],
.christmas-lights[data-position="left"] {
    transform: rotate(-90deg);
    left: -10px;
    top: 0;
    right: auto;
    bottom: 0;
    width: 100vh;
}
  
.christmas-lights[data-position="right"] {
    transform: rotate(90deg);
    left: auto;
    right: -15px;
}
  
.christmas-lights li:before {
    content: "";
    position: absolute;
    background: #505050;
    width: 10px;
    height: 10px;
    border-top-left-radius: 5px;
    border-top-right-radius: 5px;
    top: -9px;
    left: 5px;
}
  
.christmas-lights li:after {
    content: "";
    top: -23px;
    left: 10px;
    position: absolute;
    width: 60px;
    height: 20px;
    border-bottom: solid #505050 2px;
    border-radius: 50%;
}
  
.christmas-lights li:last-child:after {
    content: none;
}
  
.christmas-lights li:first-child {
    margin-left: -40px;
}
  
.christmas-lights li:nth-child(2n+1) {
    background: var(--christmas-lights-1);
    box-shadow: 0px 5px 24px 3px rgb(249 212 129);
    animation-name: flash-2;
    animation-duration: 0.4s;
}
  
.christmas-lights li:nth-child(4n+2) {
    background: var(--christmas-lights-2);
    box-shadow: 0px 5px 24px 3px var(--christmas-lights-2);
    animation-name: flash-3;
    animation-duration: 1.1s;
}
  
.christmas-lights li:nth-child(odd) {
    animation-duration: 1.8s;
}
  
.christmas-lights li:nth-child(3n+1) {
      animation-duration: 1.4s;
}
  
@keyframes flash-1 {
    0%, 100% {
        background: var(--christmas-lights-1);
        box-shadow: 0px 5px 24px 3px var(--christmas-lights-1);
    }
    50% {
        background: var(--christmas-lights-2);
        box-shadow: 0px 5px 24px 3px var(--christmas-lights-2);
    }
}
  
@keyframes flash-2 {
    0%, 100% {
        background: var(--christmas-lights-2);
        box-shadow: 0px 5px 24px 3px var(--christmas-lights-2);
    }
    50% {
        background: var(--christmas-lights-3);
        box-shadow: 0px 5px 24px 3px var(--christmas-lights-3);
    }
}
  
@keyframes flash-3 {
    0%, 100% {
        background: var(--christmas-lights-3);
        box-shadow: 0px 5px 24px 3px var(--christmas-lights-3);
    }
    50% {
        background: var(--christmas-lights-1);
        box-shadow: 0px 5px 24px 3px var(--christmas-lights-1);
    }
}
 
@media (max-width: 1024px){
  .christmas-lights[data-position="left"] {
      left: -14px;
  }
 
  .christmas-lights[data-position="right"] {
      right: -14px;
  }
   
  .christmas-lights[data-position="left"],
  .christmas-lights[data-position="right"] {
    height: 100vh;
  }
}

/* customizable snowflake styling */
.snowflake {
  color: #fff;
  font-size: 1em;
  font-family: Arial, sans-serif;
  text-shadow: 0 0 5px #000;
}

@-webkit-keyframes snowflakes-fall{0%{top:-10%}100%{top:100%}}@-webkit-keyframes snowflakes-shake{0%,100%{-webkit-transform:translateX(0);transform:translateX(0)}50%{-webkit-transform:translateX(80px);transform:translateX(80px)}}@keyframes snowflakes-fall{0%{top:-10%}100%{top:100%}}@keyframes snowflakes-shake{0%,100%{transform:translateX(0)}50%{transform:translateX(80px)}}.snowflake{position:fixed;top:-10%;z-index:9999;-webkit-user-select:none;-moz-user-select:none;-ms-user-select:none;user-select:none;cursor:default;-webkit-animation-name:snowflakes-fall,snowflakes-shake;-webkit-animation-duration:10s,3s;-webkit-animation-timing-function:linear,ease-in-out;-webkit-animation-iteration-count:infinite,infinite;-webkit-animation-play-state:running,running;animation-name:snowflakes-fall,snowflakes-shake;animation-duration:10s,3s;animation-timing-function:linear,ease-in-out;animation-iteration-count:infinite,infinite;animation-play-state:running,running}.snowflake:nth-of-type(0){left:1%;-webkit-animation-delay:0s,0s;animation-delay:0s,0s}.snowflake:nth-of-type(1){left:10%;-webkit-animation-delay:1s,1s;animation-delay:1s,1s}.snowflake:nth-of-type(2){left:20%;-webkit-animation-delay:6s,.5s;animation-delay:6s,.5s}.snowflake:nth-of-type(3){left:30%;-webkit-animation-delay:4s,2s;animation-delay:4s,2s}.snowflake:nth-of-type(4){left:40%;-webkit-animation-delay:2s,2s;animation-delay:2s,2s}.snowflake:nth-of-type(5){left:50%;-webkit-animation-delay:8s,3s;animation-delay:8s,3s}.snowflake:nth-of-type(6){left:60%;-webkit-animation-delay:6s,2s;animation-delay:6s,2s}.snowflake:nth-of-type(7){left:70%;-webkit-animation-delay:2.5s,1s;animation-delay:2.5s,1s}.snowflake:nth-of-type(8){left:80%;-webkit-animation-delay:1s,0s;animation-delay:1s,0s}.snowflake:nth-of-type(9){left:90%;-webkit-animation-delay:3s,1.5s;animation-delay:3s,1.5s}.snowflake:nth-of-type(10){left:25%;-webkit-animation-delay:2s,0s;animation-delay:2s,0s}.snowflake:nth-of-type(11){left:65%;-webkit-animation-delay:4s,2.5s;animation-delay:4s,2.5s}
</style>
<div class="snowflakes" aria-hidden="true">
  <div class="snowflake">
  ❅
  </div>
  <div class="snowflake">
  ❆
  </div>
  <div class="snowflake">
  ❅
  </div>
  <div class="snowflake">
  ❆
  </div>
  <div class="snowflake">
  ❅
  </div>
  <div class="snowflake">
  ❆
  </div>
  <div class="snowflake">
    ❅
  </div>
  <div class="snowflake">
    ❆
  </div>
  <div class="snowflake">
    ❅
  </div>
  <div class="snowflake">
    ❆
  </div>
  <div class="snowflake">
    ❅
  </div>
  <div class="snowflake">
    ❆
  </div>
</div>

<script>
let christmas = {
    delay: null,
    delete: function(){
        document.body.querySelectorAll('.christmas-lights').forEach(function(ul){
            ul.remove();
        });
    },
    create: function(){
        let v = window.innerHeight / 60 + 2,
            h = window.innerWidth / 60 + 2,
            data = {
                'top': h,
                'right': v,
                'bottom': h,
                'left': v
            },
            ul = c = null;
        for (let position in data) {
            c = data[position];
            ul = document.createElement('ul');
            ul.className = 'christmas-lights';
            ul.dataset.position = position;
            for (let i = 0; i <= c; i++) {
                ul.append(document.createElement('li'));
            }
            document.body.append(ul);
        }
    }
}
 
document.addEventListener('DOMContentLoaded', function(){
    christmas.create();
});
 
window.addEventListener('resize', function(e) {
    clearTimeout(christmas.delay);
    christmas.delay = setTimeout(function(){
        christmas.delete();
        christmas.create();
    }, 100)
});
</script>
