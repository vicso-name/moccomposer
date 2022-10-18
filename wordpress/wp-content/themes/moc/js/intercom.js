(function(){var w=window;var ic=w.Intercom;if(typeof ic==="function"){ic("reattach_activator");ic("update",intercomSettings);}else{var d=document;var i=function(){i.c(arguments)};i.q=[];i.c=function(args){i.q.push(args)};w.Intercom=i;
  function l(){var s=d.createElement("script");s.type="text/javascript";s.async=true;s.defer=true;s.src="https:/widget.intercom.io/widget/"+ w.intercomKey;var x=d.getElementsByTagName("script")[0];x.parentNode.insertBefore(s,x);}
  if(w.attachEvent){w.attachEvent("onload",l);}else{w.addEventListener("load",l,false);}}})()
Intercom('onShow', function () { if(location.search.indexOf('type')===1){
  Intercom('trackEvent', 'chat-from-ads');
} });
Intercom('boot', {app_id: window.intercomKey});

(function(h,o,t,j,a,r){
h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
h._hjSettings={hjid:1233857,hjsv:6};
a=o.getElementsByTagName('head')[0];
r=o.createElement('script');r.async=1;r.defer=1;
r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
a.appendChild(r);
})(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
