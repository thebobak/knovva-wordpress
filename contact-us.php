<?php
/**
 * Template Name: Contact Us
 */
$post   = get_post( 344 );
$output =  apply_filters( 'the_content', $post->post_content );


get_header();



?>
    <section id="primary" class="content-area contact" style="width: 100%">
        <main id="main" class="site-main" role="main">
            <div class="container">
            	 <h1><?php echo get_the_title(); ?></h1>
                 <p><?php echo $output;?></p>
                 <hr/>

            	 <div class="row">
            	 	<script charset="UTF-8" defer>(function(h){function n(a){return null===a?null:a.scrollHeight>a.clientHeight?a:n(a.parentNode)}function t(b){if(b.data){var f=JSON.parse(b.data);!f.height||p||q||(d.style.height=+f.height+"px");if(f.getter){b={};var f=[].concat(f.getter),k,h=f.length,m,c,g,e;for(k=0;k<h;k++){m=k;c=f[k]||{};c.n&&(m=c.n);g=null;try{switch(c.t){case "window":e=window;break;case "scrollParent":e=n(a)||window;break;default:e=a}if(c.e)if("rect"===c.v){g={};var l=e.getBoundingClientRect();g={top:l.top,left:l.left,width:l.width,height:l.height}}else g=e[c.v].apply(e,[].concat(c.e))||!0;else c.s?(e[c.v]=c.s,g=!0):g=e[c.v]||!1}catch(u){}b[m]=g}b.innerState=!p&&!q;a.contentWindow.postMessage(JSON.stringify({queryRes:b}),"*")}}}for(var r=h.document,b=r.documentElement;b.childNodes.length&&1==b.lastChild.nodeType;)b=b.lastChild;var d=b.parentNode,a=r.createElement("iframe");d.style.overflowY="auto";d.style.overflowX="hidden";var p=d.style.height&&"auto"!==d.style.height,q="absolute"===d.style.position||window.getComputedStyle&&"absolute"===window.getComputedStyle(d,null).getPropertyValue("position")||d.currentStyle&&"absolute"===d.currentStyle.position;h.addEventListener&&h.addEventListener("message",t,!1);a.src="http://cn-knovva.mikecrm.com/75cBtTj";a.id="mkin75cBtTj";a.onload=function(){a.contentWindow.postMessage(JSON.stringify({cif:1}),"*")};a.frameBorder=0;a.scrolling="no";a.style.display="block";a.style.minWidth="100%";a.style.width="100px";a.style.height="100%";a.style.border="none";a.style.overflow="auto";d.insertBefore(a,b)})(window);</script>
            	 </div>

             
            </div>
        </main><!-- #main -->
    </section><!-- #primary -->

<?php
get_footer();