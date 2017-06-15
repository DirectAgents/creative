$(function(){var e=window.devicePixelRatio?window.devicePixelRatio:1,t=function(e){var t=document.createElement("canvas"),n=t.getContext("2d");return n.globalCompositeOperation=e,n.globalCompositeOperation==e},n=t("soft-light"),r=navigator.userAgent||navigator.vendor||window.opera;if(!r.match(/Android/i)){var i=["triangle-solid","circle-solid","square-solid","pentagon-solid","triangle-solid"],s=[],o={width:0,height:0},u=0;i.forEach(function(e){var t=new Image;t.onload=function(){s.push({name:e,image:t}),o={width:Math.max(o.width,t.width),height:Math.max(o.height,t.height)},u++,u==i.length&&(o={width:Math.max(o.width,o.height)+8,height:Math.max(o.width,o.height)+8},a())},t.src="/img/relay/products/"+e+(n?"":"-red")+".svg"})}else $(".hero").addClass("visible");var a=function(){var e=new f(".hero canvas");$(".hero").addClass("visible")},f=function(e){var t=this;t.canvas=document.querySelector(e),t.backgroundLayer=new l(t),t.networkIcons=document.querySelectorAll(".hub > *"),t.render(),$(window).on("resize",function(){var e=t.canvas.getBoundingClientRect();(e.width!=t.logicalSize.width||e.height!=t.logicalSize.height)&&t.render()})};f.prototype={canvasRegion:function(t,n,r,i,s){var o=document.createElement("canvas");o.width=i*e,o.height=s*e;var u=o.getContext("2d");return u.scale(e,e),u.drawImage(t,Math.max(n,0)*e,Math.max(r,0)*e,Math.max(Math.min(i,t.width/e-n),1)*e,Math.max(Math.min(s,t.height/e-r),1)*e,0,0,i,s),o.toDataURL()},boundsForNetworkIcon:function(e){var t=document.querySelector(".hub");return{left:e.offsetLeft+t.offsetLeft,top:e.offsetTop+t.offsetTop,width:e.offsetWidth,height:e.offsetHeight}},render:function(){var t=this,n=t.canvas.getBoundingClientRect();t.canvas.width=n.width*e,t.canvas.height=n.height*e,t.logicalSize={width:t.canvas.width/e,height:t.canvas.height/e};var r=t.canvas.getContext("2d");r.scale(e,e),r.drawImage(t.backgroundLayer.render(t.canvas.width,t.canvas.height),0,0,t.logicalSize.width,t.logicalSize.height),t.backgroundLayer.startAnimating(50),[].forEach.call(t.networkIcons,function(e){var n=t.boundsForNetworkIcon(e);e.querySelector("img.gradient").src=t.canvasRegion(t.backgroundLayer.gradientLayer.canvas,n.left,n.top,n.width,n.height)})}};var l=function(e){var t=this;t.sceneLayer=e,t.canvas=document.createElement("canvas"),t.gradientLayer=new c,t.hexagonLayer=new h(document.querySelector(".hero .hub").offsetHeight/2),t.nodes=[],t.products=[],t.template=document.createElement("canvas"),t.channelIcons=document.querySelectorAll(".hub > .channel")};l.prototype={newProduct:function(e,t){var n=this,r=20,i={x:Math.floor(Math.random()*r*2+1)-r,y:Math.floor(Math.random()*r*2+1)-r},s={x:n.merchantBounds.left+n.merchantBounds.width/2+i.x,y:n.merchantBounds.top+n.merchantBounds.height/2+i.y},o={x:t.left+t.width/2,y:t.top+t.height/2};return new d(e,s,o,n.logicalSize)},clearBounds:function(t,n){var r=this;t.drawImage(r.sceneLayer.backgroundLayer.template,n.x*e,n.y*e,n.width*e,n.height*e,n.x,n.y,n.width,n.height)},startAnimating:function(e){var t=this;t.merchantBounds=t.sceneLayer.boundsForNetworkIcon(document.querySelector(".hub .merchant")),t.channelBounds=[],[].forEach.call(t.channelIcons,function(e){t.channelBounds.push(t.sceneLayer.boundsForNetworkIcon(e))});if(e){t.nodes=[];var r=t.hexagonLayer.vertices,i=Math.ceil(e/r.length);for(var o=0;o<r.length;o++)for(var u=0;u<i;u++){var a=r[o],f=t.hexagonLayer.nextVertex(a),l=new p(t.hexagonLayer,a,f,t.logicalSize);t.nodes.push(l)}t.currentChannel=0,t.currentProduct=0,t.products=[]}var c=function(){t.currentChannel>t.channelBounds.length-1&&(t.currentChannel=0),t.currentProduct>s.length-1&&(t.currentProduct=0),t.products.push(t.newProduct(s[t.currentProduct],t.channelBounds[t.currentChannel])),t.currentChannel++,t.currentProduct++};c();var h=t.sceneLayer.canvas.getContext("2d"),d=function(e){t.lastEmitTime=t.lastEmitTime||e,e-t.lastEmitTime>=500&&(t.lastEmitTime=e,c()),h.globalCompositeOperation="source-over",n||(h.globalAlpha=1);var r=t.nodes.length,i=t.products.length;for(var s=0;s<r;s++)t.clearBounds(h,t.nodes[s].bounds());for(var s=0;s<i;s++)t.clearBounds(h,t.products[s].bounds());h.globalCompositeOperation="soft-light",n||(h.globalAlpha=.35);for(var s=0;s<r;s++){var o=t.nodes[s].bounds(e);h.drawImage(t.nodes[s].template,o.x,o.y,o.width,o.height)}for(var s=0;s<i;s++){var o=t.products[s].bounds(e);o?h.drawImage(t.products[s].template,o.x,o.y,o.width,o.height):(t.products.splice(s,1),i--)}t.animationFrame=window.requestAnimationFrame(d)};e&&(window.cancelAnimationFrame(t.animationFrame),window.requestAnimationFrame(d))},render:function(t,r){var i=this;if(t!=i.canvas.width||r!=i.canvas.height){i.canvas.width=t,i.canvas.height=r,i.logicalSize={width:i.canvas.width/e,height:i.canvas.height/e};var s=i.canvas.getContext("2d");s.scale(e,e),s.globalCompositeOperation="source-over",s.drawImage(i.gradientLayer.render(i.canvas.width,i.canvas.height),0,0,i.logicalSize.width,i.logicalSize.height),s.globalCompositeOperation="soft-light",s.globalAlpha=n?.3:.12,s.drawImage(i.hexagonLayer.render(i.canvas.width,i.canvas.height),0,0,i.logicalSize.width,i.logicalSize.height),i.template.width=t,i.template.height=r;var o=i.template.getContext("2d");o.scale(e,e),o.drawImage(i.canvas,0,0,t,r,0,0,i.logicalSize.width,i.logicalSize.height)}return i.canvas}};var c=function(){var e=this;e.canvas=document.createElement("canvas"),e.canvas.width=0,e.canvas.height=0};c.prototype={render:function(t,n){var r=this;if(t!=r.canvas.width||n!=r.canvas.height){r.canvas.width=t,r.canvas.height=n,r.logicalSize={width:r.canvas.width/e,height:r.canvas.height/e};var i=r.canvas.getContext("2d");i.scale(e,e);var s=Math.sqrt(Math.pow(r.logicalSize.width,2)+Math.pow(r.logicalSize.height,2)),o=i.createRadialGradient(r.logicalSize.width,r.logicalSize.height,s,r.logicalSize.width,r.logicalSize.height,0);o.addColorStop(0,"#241668"),o.addColorStop(.21,"#682A84"),o.addColorStop(.48,"#D26578"),o.addColorStop(.72,"#FFA376"),o.addColorStop(1,"#FFD08A"),i.fillStyle=o,i.fillRect(0,0,r.logicalSize.width,r.logicalSize.height)}return r.canvas}};var h=function(e){var t=this;t.canvas=document.createElement("canvas"),t.canvas.width=0,t.canvas.height=0,t.hub=document.querySelector(".hero .hub"),t.hexagonRadius=e,t.vertices=[],t.rowCount=0,t.columnCount=0};h.prototype={addVertices:function(e){var t=this;t.vertices=t.vertices.concat(e);var n=t.vertices.slice(0);t.vertices.length=0;for(var r=0;r<n.length;++r)t.vertexExists(n[r])||t.vertices.push(n[r])},verticesEqual:function(e,t){return Math.abs(e.x-t.x)<10&&Math.abs(e.y-t.y)<10},vertexExists:function(e){var t=this;for(var n=0;n<t.vertices.length;n++)if(t.verticesEqual(t.vertices[n],e))return!0;return!1},randomVertex:function(){var e=this;return e.vertices[Math.floor(Math.random()*e.vertices.length)]},nextVertex:function(e,t){var n=this;t==null&&(t=e);var r=n.hexagonSize();possibleVertices=[{x:t.x,y:t.y-r.height/2},{x:t.x,y:t.y+r.height/2},{x:t.x-r.width/2,y:t.y-r.height/4},{x:t.x+r.width/2,y:t.y-r.height/4},{x:t.x-r.width/2,y:t.y+r.height/4},{x:t.x+r.width/2,y:t.y+r.height/4}];var i=possibleVertices.filter(function(t){return!n.verticesEqual(t,e)&&n.vertexExists(t)});return i[Math.floor(Math.random()*i.length)]},hexagonSize:function(){var e=this,t=Math.PI/6,n=Math.round(e.hexagonRadius*Math.cos(t)*2),r=Math.round(e.hexagonRadius*Math.sin(t)*4);return{width:n,height:r}},offset:function(e,t){var n=this,r=n.hexagonSize(),i=Math.ceil(t/(r.height*.75));i+=i%2?0:1;var s=(n.hub.offsetLeft+n.hub.offsetWidth)%r.width-(i%4!=1?r.width*1.5:r.width)-.5,o=(n.hub.offsetTop+n.hub.offsetHeight)%(r.height*.75)-r.height;return{x:s,y:o}},renderHexagon:function(e,t,n){var r=this,i=[],s=r.hexagonSize(),t=t+s.width/2,n=n+s.height/2,o=Math.PI/2+Math.PI*2/6;e.beginPath();var u={x:Math.cos(o)*r.hexagonRadius+t,y:Math.sin(o)*r.hexagonRadius+n};e.moveTo(u.x,u.y),i.push(u);for(var a=0;a<6;a++){o+=Math.PI*2/6;var f={x:Math.cos(o)*r.hexagonRadius+t,y:Math.sin(o)*r.hexagonRadius+n};i.push(f),a<3&&e.lineTo(f.x,f.y)}e.strokeStyle="rgba(255,255,255,1)",e.stroke(),r.addVertices(i)},render:function(t,n){var r=this;if(t!=null&&n!=null&&t!=r.canvas.width||n!=r.canvas.height){r.canvas.width=t,r.canvas.height=n,r.logicalSize={width:r.canvas.width/e,height:r.canvas.height/e},r.vertices=[];var i=r.canvas.getContext("2d");i.scale(e,e);var s=r.hexagonSize(),o=Math.ceil(r.logicalSize.height/(s.height*.75));o+=o%2?0:1;var u=Math.ceil(r.logicalSize.width/s.width)+2,a=r.offset(r.logicalSize.width,r.logicalSize.height);for(var f=0;f<o;f++)for(var l=0;l<u;l++){var c=l*s.width-(f%2?s.width/2:0)+a.x,h=f*s.height-s.height/4*f+a.y;r.renderHexagon(i,c,h)}}return r.canvas}};var p=function(t,n,r,i){var s=this;s.currentTime,s.hexagonLayer=t,s.containerSize=i,s.progress=Math.random();var o=10,u=13;s.duration=(Math.random()*(u-o)+o)*1e3,s.startVertex=n,s.endVertex=r,s.size=16,s.template=document.createElement("canvas"),s.template.width=s.size*e,s.template.height=s.size*e;var a=s.template.getContext("2d");a.scale(e,e),a.shadowColor="rgba(255,255,255,1)",a.shadowOffsetX=0,a.shadowOffsetY=0,a.shadowBlur=10,a.beginPath(),a.arc(s.size/2,s.size/2,2.5,0,2*Math.PI,!1),a.fillStyle="rgba(255,255,255,0.5)",a.fill()};p.prototype={bounds:function(e){var t=this;if(e){t.currentTime=t.currentTime||e,t.progress+=(e-t.currentTime)/t.duration,t.currentTime=e;if(t.progress>1){t.progress=0;var n=t.hexagonLayer.nextVertex(t.startVertex,t.endVertex);t.startVertex=t.endVertex,t.endVertex=n}}var r={x:(t.endVertex.x-t.startVertex.x)*t.progress+t.startVertex.x-t.size/2,y:(t.endVertex.y-t.startVertex.y)*t.progress+t.startVertex.y-t.size/2,width:t.size,height:t.size};return e||(r.x=Math.max(r.x,0),r.y=Math.max(r.y,0),r.width=Math.max(Math.min(r.width,t.containerSize.width-r.x),1),r.height=Math.max(Math.min(r.height,t.containerSize.height-r.y),1)),r}};var d=function(e,t,n,r){var i=this;i.icon=e,i.startTime,i.containerSize=r,i.progress=0,i.duration=7e3,i.origin=t,i.destination=n,i.rotationOffset=Math.random()*360,i.drawIcon(0)};d.prototype={linear:function(e,t,n,r){return n*e/r+t},easeOutExpo:function(e,t,n,r){return n*(-Math.pow(2,-10*e/r)+1)+t},drawIcon:function(t){var n=this;n.template==null&&(n.template=document.createElement("canvas"),n.template.width=o.width*e,n.template.height=o.height*e);var r=n.template.getContext("2d");r.clearRect(0,0,n.template.width,n.template.height),r.save(),r.translate(n.template.width/2,n.template.height/2),r.rotate(t*Math.PI/180),r.translate(-n.icon.image.width/2*e,-n.icon.image.height/2*e),r.scale(e,e),r.drawImage(n.icon.image,0,0),r.restore()},bounds:function(e){var t=this;if(e){t.startTime=t.startTime||e,t.progress=t.linear(e-t.startTime,0,1,t.duration);if(t.progress>=.99)return!1}var n={x:(t.destination.x-t.origin.x)*t.progress+t.origin.x-o.width/2,y:(t.destination.y-t.origin.y)*t.progress+t.origin.y-o.height/2,width:o.width,height:o.height};return e||(n.x=Math.max(n.x,0),n.y=Math.max(n.y,0),n.width=Math.max(Math.min(n.width,t.containerSize.width-n.x),1),n.height=Math.max(Math.min(n.height,t.containerSize.height-n.y),1)),n}}});