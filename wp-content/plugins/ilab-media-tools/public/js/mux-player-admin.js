!function(t){var e={};function n(a){if(e[a])return e[a].exports;var r=e[a]={i:a,l:!1,exports:{}};return t[a].call(r.exports,r,r.exports,n),r.l=!0,r.exports}n.m=t,n.c=e,n.d=function(t,e,a){n.o(t,e)||Object.defineProperty(t,e,{enumerable:!0,get:a})},n.r=function(t){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(t,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(t,"__esModule",{value:!0})},n.t=function(t,e){if(1&e&&(t=n(t)),8&e)return t;if(4&e&&"object"==typeof t&&t&&t.__esModule)return t;var a=Object.create(null);if(n.r(a),Object.defineProperty(a,"default",{enumerable:!0,value:t}),2&e&&"string"!=typeof t)for(var r in t)n.d(a,r,function(e){return t[e]}.bind(null,r));return a},n.n=function(t){var e=t&&t.__esModule?function(){return t.default}:function(){return t};return n.d(e,"a",e),e},n.o=function(t,e){return Object.prototype.hasOwnProperty.call(t,e)},n.p="/",n(n.s=666)}({666:function(t,e,n){t.exports=n(667)},667:function(t,e){window.oldMediaElementPlayer=window.MediaElementPlayer,window.MediaElementPlayer=function(t,e){"VIDEO"!==t.tagName&&new window.oldMediaElementPlayer(t,e)},document.addEventListener("DOMContentLoaded",(function(){var t=function(t){var e=jQuery(t);if(e){var n=e.text();n=n.replace(/\<video(?:[^>]+)wp-video-shortcode\"(?:.*)\s+(?:.*)\s+(?:.*)\s+(?:.*)\s+(?:.*)\s+<\/video>/gm,'\n                <div style="{{ w_rule }}" class="wp-media-wrapper wp-video">\n\t\t\t\t\t<video controls="controls" class="wp-video-shortcode" preload="metadata"\n\t\t\t\t\t\t<# if ( data.width ) { #>width="{{ data.width }}"<# } #>\n\t\t\t\t\t\t<# if ( data.height ) { #>height="{{ data.height }}"<# } #>\n\t\t\t\t\t\t<# if ( data.image && data.image.src !== data.icon ) { #>poster="{{ data.image.src }}"<# } #>>\n                        <# if (data.mux && data.mux.url) { #>\n\t\t\t\t\t\t<source type="application/vnd.apple.mpegurl" src="{{ data.mux.url }}" />\n                        <# } else if (data.hls) { #>\n\t\t\t\t\t\t<source type="application/vnd.apple.mpegurl" src="{{ data.hls.url }}" />\n                        <# _.each(data.hls.subtitles, subtitle => { #>\n                        <track kind="<# if (subtitle.cc) { #>captions<# } else { #>subtitles<# } #>" src="{{ subtitle.url }}" srclang="{{ subtitle.language_code }}" label="{{ subtitle.name }}" />\n                        <# }); #>\n                        <# } else { #>\n\t\t\t\t\t\t<source type="{{ data.mime }}" src="{{ data.url }}" />\n                        <# } #>\n\t\t\t\t\t</video>\n\t\t\t\t</div>\n                                '),e.text(n)}};t("#tmpl-attachment-details-two-column"),t("#tmpl-attachment-details")}))}});