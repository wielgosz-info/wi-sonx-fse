(()=>{"use strict";var e,t={893:()=>{const e=window.wp.blocks,t=window.React,n=window.wp.blockEditor,r=window.wp.primitives;function c(){return(0,t.createElement)(r.SVG,{viewBox:"0 0 24 24",version:"1.1"},(0,t.createElement)(r.Path,{d:"m2 6c0-1.656 1.344-3 3-3h14c1.656 0 3 1.344 3 3v8c0 1.656-1.344 3-3 3h-3l2 5-6-5h-7c-1.656 0-3-1.344-3-3z"}))}c.displayName="Comments count";const i={CommentsCount:c,Time:function(){return(0,t.createElement)(r.SVG,{viewBox:"0 0 24 24",version:"1.1"},(0,t.createElement)(r.Path,{d:"m12 2c5.519 0 10 4.481 10 10s-4.481 10-10 10-10-4.481-10-10 4.481-10 10-10zm0 2c4.415 0 8 3.585 8 8s-3.585 8-8 8-8-3.585-8-8 3.585-8 8-8z",fillRule:"evenodd"}),(0,t.createElement)(r.Path,{d:"m11.055 13.329.002.004c.036.103.09.202.162.292.097.121.216.213.347.276l.001.001c.131.063.278.098.433.098.115 0 .226-.02.329-.055l.004-.002c.103-.036.202-.09.292-.162l5-4c.431-.345.501-.975.156-1.406s-.975-.501-1.406-.156l-3.375 2.7v-2.919c0-.552-.448-1-1-1s-1 .448-1 1v5c0 .115.02.226.055.329z"}))},Views:function(){return(0,t.createElement)(r.SVG,{viewBox:"0 0 24 24",version:"1.1"},(0,t.createElement)(r.Path,{d:"m12 9.201c-1.505 0-2.727 1.255-2.727 2.799 0 1.545 1.222 2.8 2.727 2.8s2.727-1.255 2.727-2.8c0-1.544-1.222-2.799-2.727-2.799z"}),(0,t.createElement)(r.Path,{d:"m12 5c-4.545 0-8.427 2.903-10 7 1.573 4.097 5.455 7 10 7 4.55 0 8.427-2.903 10-7-1.573-4.097-5.45-7-10-7zm0 11.667c-2.509 0-4.545-2.09-4.545-4.667 0-2.576 2.036-4.666 4.545-4.666s4.545 2.09 4.545 4.666c0 2.577-2.036 4.667-4.545 4.667z"}))},Dots:function(){return(0,t.createElement)(r.SVG,{viewBox:"0 0 24 24",version:"1.1"},(0,t.createElement)(r.Rect,{x:"2",y:"2",width:"4",height:"4"}),(0,t.createElement)(r.Rect,{x:"10",y:"2",width:"4",height:"4"}),(0,t.createElement)(r.Rect,{x:"18",y:"2",width:"4",height:"4"}),(0,t.createElement)(r.Rect,{x:"2",y:"10",width:"4",height:"4"}),(0,t.createElement)(r.Rect,{x:"10",y:"10",width:"4",height:"4"}),(0,t.createElement)(r.Rect,{x:"18",y:"10",width:"4",height:"4"}),(0,t.createElement)(r.Rect,{x:"2",y:"18",width:"4",height:"4"}),(0,t.createElement)(r.Rect,{x:"10",y:"18",width:"4",height:"4"}),(0,t.createElement)(r.Rect,{x:"18",y:"18",width:"4",height:"4"}))}},o=JSON.parse('{"UU":"wi-sonx-fse/icon"}'),a=[];Object.entries(i).forEach((([e,t])=>{a.push({name:e,title:`${t.displayName||e}`,icon:{foreground:"#5ac3b4",src:t},attributes:{icon:e},isActive:(e,t)=>e.icon.toLowerCase()===t.icon.toLowerCase()})})),a.length&&(a[0].isDefault=!0);const s=a;(0,e.registerBlockType)(o.UU,{edit:function({attributes:e}){const r=i[e.icon];return(0,t.createElement)(t.Fragment,null,(0,t.createElement)("span",{...(0,n.useBlockProps)()},(0,t.createElement)(r,null)))},save:function({attributes:e}){const r=i[e.icon];return(0,t.createElement)("span",{...n.useBlockProps.save()},(0,t.createElement)(r,null))},variations:s})}},n={};function r(e){var c=n[e];if(void 0!==c)return c.exports;var i=n[e]={exports:{}};return t[e](i,i.exports,r),i.exports}r.m=t,e=[],r.O=(t,n,c,i)=>{if(!n){var o=1/0;for(h=0;h<e.length;h++){for(var[n,c,i]=e[h],a=!0,s=0;s<n.length;s++)(!1&i||o>=i)&&Object.keys(r.O).every((e=>r.O[e](n[s])))?n.splice(s--,1):(a=!1,i<o&&(o=i));if(a){e.splice(h--,1);var l=c();void 0!==l&&(t=l)}}return t}i=i||0;for(var h=e.length;h>0&&e[h-1][2]>i;h--)e[h]=e[h-1];e[h]=[n,c,i]},r.o=(e,t)=>Object.prototype.hasOwnProperty.call(e,t),(()=>{var e={185:0,269:0};r.O.j=t=>0===e[t];var t=(t,n)=>{var c,i,[o,a,s]=n,l=0;if(o.some((t=>0!==e[t]))){for(c in a)r.o(a,c)&&(r.m[c]=a[c]);if(s)var h=s(r)}for(t&&t(n);l<o.length;l++)i=o[l],r.o(e,i)&&e[i]&&e[i][0](),e[i]=0;return r.O(h)},n=globalThis.webpackChunkwi_sonx_fse=globalThis.webpackChunkwi_sonx_fse||[];n.forEach(t.bind(null,0)),n.push=t.bind(null,n.push.bind(n))})();var c=r.O(void 0,[269],(()=>r(893)));c=r.O(c)})();