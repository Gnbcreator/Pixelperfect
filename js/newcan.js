


var canvas = new fabric.Canvas('myCanvas',{
    selectionLineWidth: 2,
     selectionColor: "rgba(138, 125, 255, 0.18)",
     selectionBorderColor: "rgba(25, 0, 187, 0.5)",
     borderScaleFactor:3,
    isDrawingMode:false
});
window.onload = function() {

resizeCanvas();



function resizeCanvas() {
var container = document.getElementById('canvas-container');
var canvasElement = document.getElementById('myCanvas');
canvasElement.width = container.offsetWidth;
canvasElement.height = container.offsetHeight;
canvas.setWidth(container.offsetWidth);
canvas.setHeight(container.offsetHeight);
canvas.backgroundColor='#E6E6E6';
canvas.renderAll();
}


canvas.on('mouse:wheel', function(opt) {
var delta = opt.e.deltaY;
var zoom = canvas.getZoom();
zoom *= 0.999 ** delta;
if (zoom > 20) zoom = 20;
if (zoom < 0.01) zoom = 0.01;
canvas.zoomToPoint({ x: opt.e.offsetX, y: opt.e.offsetY }, zoom);
opt.e.preventDefault();
opt.e.stopPropagation();
});
}  
// line drawaing 

// Initialize Fabric.js canvas


// Listen to input event on color picker
document.getElementById('colorPicker').addEventListener('input', function(event) {
const color = event.target.value; 
canvas.backgroundColor = color; 

canvas.renderAll(); 
});

fabric.Object.prototype.transparentCorners = true;
fabric.Object.prototype.cornerColor = 'rgba(1, 54, 255, 2)';
fabric.Object.prototype.cornerStyle = 'square';
fabric.Object.prototype.cornerSize = 10;
fabric.Object.prototype.cornerWidth = 200;


// Given funtion is used to create  lines and other 


let $ = function(btn) { // Given function is used to create lines and other
return document.getElementById(btn);
}

let shapeBtns = [$('lineBtn'), $('arrowBtn1'), $('arrowBtn2')];

for (let i = 0; i < shapeBtns.length; i++) {
shapeBtns[i].addEventListener('click', () => {
  
    canvas.getObjects().forEach(o => {
        o.selectable = false; // Fix: Change selectable to false
    });
    canvas.selection = false;
    canvas.on({
        'mouse:down': addingShapeOnMouseDown,
        'mouse:move': drawingShapeOnMouseMove,
        'mouse:up': stopShapeOnMouseUp,
    });

    btnIndex = i;
});
}

let line, arrowHead1, arrowHead2, btnIndex;
let mouseDown = false;

function addingShapeOnMouseDown(o) {
mouseDown = true;
let pointer = canvas.getPointer(o.e);
let FillColor= document.getElementById('FillColor');
let StrokeColor= document.getElementById('StrokeColor'); 
let linePath = 'M' + pointer.x + ' ' + pointer.y + 'L' + pointer.x + ' ' + pointer.y;
line = new fabric.Path(linePath, {
    id: 'added-line',
    stroke: 'red',
    strokeWidth: 1,
    originX: 'center',
    originY: 'center',
    hasControls: false,
    hasBorders: true,
    objectCaching: false,
    
});
canvas.add(line);
addLayerToList();


line.set({
  stroke:StrokeColor.value,
  fill:FillColor.value,
}); 
canvas.requestRenderAll();


 let arrowHeadPath = 'M 0 0 L 6.67 3.33 L 0 6.67 Z';


if (btnIndex === 1 || btnIndex === 2) {
    arrowHead1 = new fabric.Path(arrowHeadPath, {
        label: 'arrow-line',
        fill: 'black',
        originX: 'center',
        originY: 'center',
        hasControls: false,
        hasBorders: false,
        top: pointer.y,
        left: pointer.x
    });
    canvas.add(arrowHead1);
    StrokeColor.addEventListener('input', function StrokeColor() {
        arrowHead1.set({
          stroke:this.value,    
          
         }); 
   });

    if (btnIndex === 2) {
        arrowHead2 = new fabric.Path(arrowHeadPath, {
            label: 'arrow-line',
            fill: 'balck',
            strokeWidth:1,
            originX: 'center',
            originY: 'center',
            hasControls: false,
            hasBorders: false,
            top: pointer.y,
            left: pointer.x,
            angle: 100
        });
        canvas.add(arrowHead2);

       
        StrokeColor.addEventListener('input', function StrokeColor() {
            arrowHead2.set({
              stroke:this.value,
                  
             }); 
        canvas.requestRenderAll(); 
       });
    }
}
canvas.requestRenderAll();
}

function drawingShapeOnMouseMove(o) {
if (mouseDown === true) {
    let pointer = canvas.getPointer(o.e);
    let startingPointX = line.path[0][1];
    let startingPointY = line.path[0][2];
    line.path[1][1] = pointer.x;
    line.path[1][2] = pointer.y;
    line.setCoords();

    let centerX = getCenterCoords(startingPointX, startingPointY, line.path[1][1], line.path[1][2]).cx;
    let centerY = getCenterCoords(startingPointX, startingPointY, line.path[1][1], line.path[1][2]).cy;
    console.log(centerX);
    console.log(centerY);

    if (btnIndex === 1 || btnIndex === 2) {
        arrowHead1.left = pointer.x;
        arrowHead1.top = pointer.y;

        let width = Math.abs(pointer.x - line.path[0][1]);
        let height = Math.abs(pointer.y - line.path[0][2]);
        let ratio = height / width;
        let angle = (Math.atan(ratio) / Math.PI) * 180;

        if (btnIndex === 1) {
            if (arrowHead1.left >= startingPointX) {
                arrowHead1.angle = arrowHead1.top <= startingPointY ? 360 - angle : angle;
            } else {
                arrowHead1.angle = arrowHead1.top <= startingPointY ? 180 + angle : 180 - angle;
            }
        } else if (btnIndex === 2) {
            if (arrowHead1.left >= arrowHead2.left) {
                arrowHead1.angle = arrowHead1.top <= arrowHead2.top ? 360 - angle : angle;
                arrowHead2.angle = arrowHead1.top <= arrowHead2.top ? 360 - angle - 180 : angle + 180;
            } else {
                arrowHead1.angle = arrowHead1.top <= arrowHead2.top ? 180 + angle : 180 - angle;
                arrowHead2.angle = arrowHead1.top <= arrowHead2.top ? 360 + angle : 360 - angle;
            }
        }
        if (typeof arrowHead1 !== 'undefined') {
            arrowHead1.setCoords();
        }
        if (typeof arrowHead2 !== 'undefined') {
            arrowHead2.setCoords();
        }
    }
    canvas.requestRenderAll();
}
}


function stopShapeOnMouseUp() {
mouseDown = false;
deactivateMouseEvent();
let FillColor= document.getElementById('FillColor');
let StrokeColor= document.getElementById('StrokeColor');
let updatedLinePath = line.path;
canvas.remove(line);
line = new fabric.Path(updatedLinePath, {
  id: 'added-line',
  label: (btnIndex === 1 || btnIndex === 2) ? 'arrow-line' : '',
  stroke: 'black',
  strokeWidth: 1,
  originX: 'center',
  originY: 'center',
  hasControls: false,
  hasBorders: false,
  objectCaching: false,
  selectable: false
});
canvas.add(line);

// assuming 'FillColor' is the id of your input element
 StrokeColor.addEventListener('input', function StrokeColor() {
            line.set({
              stroke:this.value     
             }); 
             saveCanvasState();
        canvas.requestRenderAll(); 
       });
FillColor.addEventListener('input',()=>{
    line.set({
        fill:this.value     
       }); 
})
canvas.requestRenderAll();

if (btnIndex === 1) {

// canvas.remove(line, arrowHead1);

// Create a group of arrow objects
let objects = [];
canvas.getObjects().forEach(o => {
    if (o.label === 'arrow-line') {
        objects.push(o);
    }
});
let singleArrow = new fabric.Group(objects, {
    id: 'single-line',
    originX: 'center',
    originY: 'center',
    hasControls: false,
    hasBorders: false,
    objectCaching: false,
    selectable: false
});
canvas.add(singleArrow);

// Update canvas rendering
canvas.requestRenderAll();
StrokeColor.addEventListener('input', function StrokeColor() {
singleArrow.set({
    'stroke':this.value
}); 
canvas.requestRenderAll(); 
});

canvas.remove(line, arrowHead1);

} 
else if (btnIndex === 2) {
  canvas.bringToFront(arrowHead1);
  canvas.bringToFront(arrowHead2);

  let objects = [];
  canvas.getObjects().forEach(o => {
      if (o.label === 'arrow-line') {
          objects.push(o);
      }
  });
  let doubleArrow = new fabric.Group(objects, {
      id: 'double-arrow',
      originX: 'center',
      originY: 'center',
      hasControls: false,
      hasBorders: false,
      objectCaching: false,
      selectable: false
  });
  canvas.add(doubleArrow);
 
  
   FillColor.addEventListener('input', function StrokeColor() {
    doubleArrow.set({
        fill:this.value,
    }); 
     canvas.requestRenderAll();
   });
  canvas.remove(line, arrowHead1, arrowHead2);
  addLayerToList('Double Arrow Line');
}
canvas.requestRenderAll();
}




function getCenterCoords(sx, sy, ex, ey) {
let cx = (sx + ex) / 2;
let cy = (sy + ey) / 2;
return {
    cx: cx,
    cy: cy
}
}



/**
* RECTANGLE
* MOUSE MOVMENT
*/


let FillColor = document.getElementById('FillColor');
let StrokeColor = document.getElementById('StrokeColor');
let Rectangle = document.getElementById('rectangle');

Rectangle.addEventListener('click', () => {
canvas.on({
    'mouse:down': addingRectangleMouseDown,
    'mouse:move': drawingRectangleMouseMove,
    'mouse:up': stopRectangleMouseUp,

    'selection:created': showPropertyPanel,
    'selection:updated': showPropertyPanel,
    'selection:cleared': hidePropertyPanel
});
});

function addingRectangleMouseDown(o) {
mouseDown = true;
let pointer = canvas.getPointer(o.e);
let mouseStartX = pointer.x;
let mouseStartY = pointer.y;

if (mouseDown) {
    rect = new fabric.Rect({
        id: 'Rectangle',
        left: mouseStartX,
        top: mouseStartY,
        width: 0,
        height: 0,
        strokeWidth: 0.5,
        fill: 'white',
        selection: true,
    });
    canvas.add(rect);
    rect.set('zIndex', canvas.getObjects().length);
    addLayerToList('Rectangle', rect.zIndex);

    FillColor.addEventListener('input', function () {
        canvas.getActiveObject().set({
            fill: this.value
        });
        canvas.renderAll();
    });

    StrokeColor.addEventListener('input', function () {
        canvas.getActiveObject().set({
            stroke: this.value
        });
        canvas.renderAll();
    });
}
}



function drawingRectangleMouseMove(o) {
if (!mouseDown) return;

let pointer = canvas.getPointer(o.e);
let upadPosiX = pointer.x;
let upadPosiY = pointer.y;

rect.set({
    width: upadPosiX - rect.left,
    height: upadPosiY - rect.top,
});
canvas.requestRenderAll();

}
function stopRectangleMouseUp() {
mouseDown = false;
deactivateMouseEvent();

}

/**
* CODE FOR THE CREATING THE CIRCLE BY THE
* MOUSE MOVMENT
*/

// Get the canvas element
let circleBtn = document.getElementById('circle');
circleBtn.addEventListener('click', () => {

canvas.hasBorders=true;
canvas.getObjects().forEach(o => {
    o.selectable =false; // Fix: Change selectable to false
});
canvas.on({
          'mouse:down':addingCircleMouseDown,
          'mouse:move': drawingCircleMouseMove,
          'mouse:up':stopCircleMouseUp,    
          
          'selection:created':showPropertyPanel(),
          'selection:updated':showPropertyPanel(),
          'selection:cleared':showPropertyPanel()
          });


});

let propertyBtns=[$('FillColor'),$('StrokeColor'),$('rotate'),$('borderRadius'),$('X-axis'),$('Y-axis'),$('width'),$('height')];
function addingCircleMouseDown(o) {
if (mouseDown=true) {
    var pointer = canvas.getPointer(o.e);
    origX = pointer.x;
    origY = pointer.y;
    circle = new fabric.Circle({
        id:'circle',
        left: origX,
        top: origY,
        originX: 'left',
        originY: 'top',
        radius: pointer.x - origX,
        strokeWidth: 3,
        fill:'white',
        hasControls:true,
        hasBorders:true,
        objectCaching:true,
        zIndex: canvas.getObjects().length + 1 
    });

    canvas.add(circle);
    addLayerToList('Circle',circle.zIndex);

    if (propertyBtns[0]) {
        propertyBtns[0].addEventListener('input', function FillColor() {
            canvas.getActiveObject().set({
                fill: this.value,
            });
            canvas.renderAll();
        });
    }
    if (propertyBtns[1]) {
        propertyBtns[1].addEventListener('input', function StrokeColor() {
            canvas.getActiveObject().set({
                stroke: this.value,
            });
            canvas.renderAll();
        });
    }
}


}

function drawingCircleMouseMove(o) {

if (mouseDown) {
    var pointer = canvas.getPointer(o.e);
    var radius = Math.max(Math.abs(origY - pointer.y), Math.abs(origX - pointer.x)) / 2;
    if (radius > circle.strokeWidth) {
        radius -= circle.strokeWidth / 2;
    }
    circle.set({
        radius: radius,
        selectable: true,
        selection: true,
        hoverCursor: 'pointer'
    });
    if (origX > pointer.x) {
        circle.set({ originX: 'right', hoverCursor: 'auto' });
    } else {
        circle.set({ originX: 'left', hoverCursor: 'auto' });
    }
    if (origY > pointer.y) {
        circle.set({ originY: 'bottom' });
    } else {
        circle.set({ originY: 'top' });
    }
    canvas.renderAll();

}
}

function stopCircleMouseUp(o) {
mouseDown = false;
deactivateMouseEvent();
}



/**   
* CREATING THE STAR SHAPE
* 
*/


let starShapeBtn = document.getElementById('star');


starShapeBtn.addEventListener('click', () => {

canvas.getObjects().forEach(o => {
    o.selectable =false; 
});
canvas.on({
          'mouse:down' : addingStarShapeMouseDown,
          'mouse:move' : drawingStarShapeMouseMove,
          'mouse:up' : stopStarBtnMouseUp
         });

});

function getStarPoints(center, numberOfPoints, outerRadius, innerRadius) {
let angle = Math.PI / numberOfPoints;
let points = [];
for (let i = 0; i < 2 * numberOfPoints; i++) {
    let radius = i % 2 === 0 ? outerRadius : innerRadius;
    let x = center.x + radius * Math.cos(i * angle);
    let y = center.y + radius * Math.sin(i * angle);
    points.push({ x: x, y: y });
}
return points;
}

function addingStarShapeMouseDown(o) {
if (mouseDown=true){
let pointer = canvas.getPointer(o.e);
    let startPoint = new fabric.Point(pointer.x, pointer.y);
    let star = new fabric.Polygon(getStarPoints(startPoint, 5,8,20), {
             id:'star',
             fill: 'blue',
             left: pointer.x,
             top: pointer.y,
             hasControls: false,
             hasBorders: false,
             objectCaching: false,
             zIndex: canvas.getObjects().length + 1 
        });
   canvas.add(star);
   addLayerToList('Star',star.zIndex);
   canvas.renderAll();
}

}


function drawingStarShapeMouseMove(o) {
if (mouseDown){
let pointer = canvas.getPointer(o.e);
let star = canvas.item(canvas.getObjects().length - 1); 
star.set({
    points: getStarPoints(new fabric.Point(star.left, star.top),5,8,20),
    width: pointer.x - star.left,
    height: pointer.y - star.top
});
if (propertyBtns[0]) {
    propertyBtns[0].addEventListener('input', function FillColor() {
       canvas.getActiveObject().set({
            fill: this.value,
        });
        canvas.renderAll();
    });
}
if (propertyBtns[1]) {
    propertyBtns[1].addEventListener('input', function StrokeColor() {
        canvas.getActiveObject().set({
            stroke: this.value,
        });
        canvas.renderAll();
    });
}

canvas.renderAll();
}

}

function stopStarBtnMouseUp() {
mouseDown=false;
deactivateMouseEvent();
}

/**   
* CREATING THE TRIANGLE SHAPE
* 
*/

let trangleShapeBtn = document.getElementById('triangle');

trangleShapeBtn .addEventListener('click', () => {

// deactivateMouseEvent();
canvas.getObjects().forEach(o => {
    o.selectable = false; 
});
    canvas.on({
               'mouse:down': addingTrianglShapeMouseDown,
               'mouse:move':drawingTriangleShapeMouseMove,
               'mouse:up': stopTriangleBtnMouseUp,

               'selection:created':showPropertyPanel,
               'selection:updated':showPropertyPanel,
               'selection:cleared': hidePropertyPanel
               });

});


let triangle;


function addingTrianglShapeMouseDown(o) {
mouseDown = true;
let pointer = canvas.getPointer(o.e);
let startX = pointer.x;
let startY = pointer.y;

triangle = new fabric.Triangle({
    width: 50,
    height: 50,
    left: startX,
    top: startY,
    fill: 'white', // Default fill color
    zIndex: canvas.getObjects().length + 1 
});

canvas.add(triangle);
addLayerToList('Triangle',triangle.zIndex); 
canvas.requestRenderAll();

let fillInput = document.getElementById('FillColor');
let strokeInput = document.getElementById('StrokeColor');

fillInput.addEventListener('input', function() {
if (triangle) {
    canvas.getActiveObject().set({ fill: this.value });
    canvas.renderAll();
}
});

strokeInput.addEventListener('input', function() {
if (triangle) {
    canvas.getActiveObject().set({ stroke: this.value });
    canvas.renderAll();
}
});
}

function drawingTriangleShapeMouseMove(o) {
if (!mouseDown) return;
let pointer = canvas.getPointer(o.e);
let updatedPosX = pointer.x;
let updatedPosY = pointer.y;
triangle.set({
    width: Math.abs(updatedPosX - triangle.left),
    height: Math.abs(updatedPosY - triangle.top),
});
canvas.renderAll();
}

function stopTriangleBtnMouseUp(o) {
mouseDown = false;
deactivateMouseEvent();
}


/**   
* Pre-Defined Some Rations According To the Screen Size,
* 
*/

let ratioBtns = [$('Desktop'), $('MackBookAir'), $('MackBookPro'), $('iphone13Pro'), $('iphone14pro'), $('iphone15pro'), $('samsunggalexyS21ultra'), $('ipadPro')];

for (let i = 0; i < ratioBtns.length; i++) {
ratioBtns[i].addEventListener('click', () => {
    if (ratioBtns[i] === ratioBtns[0]) {
        let Desktop = new fabric.Rect({
            width: 1920,
            height: 1080,
            stroke: 1,
            strokeWidth: 0,
            fill: 'white',
            stroke: 'blue',
            hasControls: false,
            zIndex: canvas.getObjects().length + 1
        });
        canvas.add(Desktop);
        canvas.requestRenderAll();
        addLayerToList('Normal Desktop');
    } else if (ratioBtns[i] === ratioBtns[1]) {
        let MackBookAir = new fabric.Rect({
            width: 1440,
            height: 900,
            stroke: 2,
            strokeWidth: 0,
            fill: 'white',
            stroke: 'blue',
            hasControls: false,
            zIndex: canvas.getObjects().length + 1
        })
        canvas.add(MackBookAir);
        canvas.requestRenderAll();
        addLayerToList('MackbookAir');
    } else if (ratioBtns[i] === ratioBtns[2]) {
        let MackBookPro = new fabric.Rect({
            width: 2304,
            height: 1440,
            stroke: 2,
            strokeWidth: 0,
            fill: 'white',
            stroke: 'blue',
            hasControls: false,
            zIndex: canvas.getObjects().length + 1
        });
        canvas.add(MackBookPro);
        canvas.requestRenderAll();
        addLayerToList('MackbookPro');
    } else if (ratioBtns[i] === ratioBtns[3]) {
        let iphone13Pro = new fabric.Rect({
            width: 390,
            height: 844,
            stroke: 2,
            strokeWidth: 0,
            fill: 'white',
            stroke: 'blue',
            hasControls: false,
            zIndex: canvas.getObjects().length + 1
        });
        canvas.add(iphone13Pro);
        canvas.requestRenderAll();
        addLayerToList('iphone13 pro');
    } else if (ratioBtns[i] === ratioBtns[4]) {
        let iphone14pro = new fabric.Rect({
            width: 393,
            height: 852,
            stroke: 2,
            strokeWidth: 0,
            fill: 'white',
            stroke: 'blue',
            hasControls: false,
            zIndex: canvas.getObjects().length + 1
        });
        canvas.add(iphone14pro);
        canvas.requestRenderAll();
        addLayerToList('iphone14 pro');
    } else if (ratioBtns[i] === ratioBtns[5]) {
        let iphone15pro = new fabric.Rect({
            width: 393,
            height: 852,
            stroke: 2,
            strokeWidth: 0,
            fill: 'white',
            stroke: 'blue',
            hasControls: false,
        })
        canvas.add(iphone15pro);
        canvas.requestRenderAll();
        addLayerToList('iphone 15pro');
    } else if (ratioBtns[i] === ratioBtns[6]) {
        let samsunggalexyS21ultra = new fabric.Rect({
            width: 412,
            height: 915,
            stroke: 2,
            strokeWidth: 0,
            fill: 'white',
            stroke: 'blue',
            hasControls: false,
        });
        canvas.add(samsunggalexyS21ultra);
        canvas.requestRenderAll();
        addLayerToList('samsung s23');
    } else if (ratioBtns[i] === ratioBtns[7]) {
        let ipadPro = new fabric.Rect({
            width: 1024,
            height: 768,
            stroke: 2,
            strokeWidth: 0,
            fill: 'white',
            stroke: 'blue',
            hasControls: false,
        });
        canvas.add(ipadPro);
        canvas.requestRenderAll();
        addLayerToList('Ipad Pro');
    }
});
}



$('MoveTool').addEventListener('click', deactivateMouseEvent);



let selectionBtn= document.getElementById('selctionBtn');
selectionBtn.addEventListener('click',() => {

deactivateMouseEvent();
canvas.getObjects().forEach(o => {
    o.selectable = true;
    o.hasBorders = true;
    o.hasControls = true;
    canvas.selection=true;
});

});

/**
* TEXT CREATING AND ADDING TO THE CANVAS  , SOME TEXT EDITOR FUNCTIONS..........
* 
*/
let textEditor=document.getElementById('text-editor');
let createTextAreaBtn = document.getElementById('textBtn');
createTextAreaBtn.addEventListener('click', () => {

deactivateMouseEvent();
canvas.getObjects().forEach(o => {
    o.selectable = false;
});
canvas.on({
    'mouse:down': startAddingText,
    'mouse:up': stopAddingText,
    
    'selection:created':showPropertyPanel,
    'selection:updated':showPropertyPanel,
    'selection:cleared': hidePropertyPanel
});


});

function startAddingText(o) {
mouseDown = true;
var fonts = [
    "Arial",
    "Arial Black",
    "Arial Narrow",
    "Arial Rounded MT Bold",
    "Avengeance Mightiest Avenger",
    "Bahnschrift",
    "Pacifico",
    "VT323",
    "Quicksand",
    "Inconsolata",
    "Berlin Sans FB Demi",
    "Calibri",
    "Cambria",
    "Candara",
    "Times New Roman",
    "Segoe UI Emoji",
    "Roboto",
    "Poppins",
    "Product Sans"
];

let pointer = canvas.getPointer(o.e);
let mouseStartX = pointer.x;
let mouseStartY = pointer.y;
var textEditable = new fabric.Textbox('Text', {
    top: mouseStartY,
    left: mouseStartX,
    editable: true,
    zIndex: canvas.getObjects().length + 1 
});
canvas.add(textEditable);
addLayerToList('Text',textEditable.zIndex)
canvas.requestRenderAll();


// let fillInput = document.getElementById('FillColor');
// let strokeInput = document.getElementById('StrokeColor');


if (propertyBtns[0]) {
    propertyBtns[0].addEventListener('input', function () {
       canvas.getActiveObject().set({
            fill: this.value,
        });
        canvas.renderAll();
    });
}
if (propertyBtns[1]) {
    propertyBtns[1].addEventListener('input', function () {
        canvas.getActiveObject().set({
            stroke: this.value,
        });
        canvas.renderAll();
    });
}

  // styling
 
let fontProperty=[ $('font-size'),$('font-weight'),$('style-bold'),$('style-italic'),$('style-underline')];
 
if (fontProperty[0]) {
    fontProperty[0].addEventListener('change',function() {
       var size = parseInt(this.value);
       canvas.getActiveObject().set({
            fontSize:size
        });
        canvas.renderAll();
    });
 
}
if (fontProperty[1]) {
    fontProperty[1].addEventListener('change',()=> {
    let Weight=this.value;
        canvas.getActiveObject().set({
            
            fontWeight:Weight,
        });
        canvas.renderAll();
    });
}
if (fontProperty[2]) {
    fontProperty[2].addEventListener('click',()=> {
        canvas.getActiveObject().set({
            fontStyle:'bold',
        });
        canvas.renderAll();
    });
    fontProperty[2].addEventListener('dblclick', function Bold() {
        canvas.getActiveObject().set({
            fontStyle:'normal',
        });
        canvas.renderAll();
    });
   
}

if (fontProperty[3]) {
    fontProperty[3].addEventListener('click', function() {
        canvas.getActiveObject().set({
            fontStyle: this.checked ? 'italic' : 'normal'
        });
        canvas.renderAll();
    });
}


if (fontProperty[4]  ) {
     fontProperty[4].addEventListener('click', function underline() {
        canvas.getActiveObject().set({
            underline:true
        });
        canvas.renderAll();
    });
    fontProperty[4].addEventListener('dblclick',function underline() {
        canvas.getActiveObject().set({
            underline:false
        });
        canvas.renderAll();
    });
    
}


let fontFamily = document.getElementById('fontFamilys'); //  changing the font-family
fontFamily.innerHTML = "Times New Roman"; 

fonts.forEach(function (font) {
    var option = document.createElement('option');
    option.innerHTML = font;
    option.value = font;
    fontFamily.appendChild(option);
});

fontFamily.addEventListener('change', function () {
    canvas.getActiveObject().set("fontFamily", this.value); // Set fontFamily property
    canvas.renderAll();
});


}


function stopAddingText() {
mouseDown=false;
deactivateMouseEvent()

}

/**
* CREATE FREE DRAWING TOOL KIT ,PENCIL BRUSH PAINT
*/

let drawBtn = document.getElementById('drawing-mode');
drawBtn.addEventListener('click', () => {

let drawingProperty = document.getElementById('drawing-property-panel');
 if (drawingProperty.style.display === 'none') {
    drawingProperty.style.display = 'block';
      
    canvas.isDrawingMode = !canvas.isDrawingMode;
    if (canvas.isDrawingMode) {
        updateBrush() ;
    }
} 
else {
    drawingProperty.style.display = 'none';
    
}

});


function updateBrush() {
var color = document.getElementById("FillColor"); 
var width = document.getElementById('drawing-line-width'); 
var type = document.getElementById("type").value; 

// Check if canvas is defined
if (!canvas) {
    return;
}

color.addEventListener('change', function() {
    canvas.freeDrawingBrush.color = color.value;

});

width.addEventListener('change', function() {
    canvas.freeDrawingBrush.width = parseInt(width.value); 
    freeDrawingBrush.set({
        zIndex: canvas.getObjects().length + 1 
    })
});

switch (type) {
    case "PencilBrush":
        canvas.freeDrawingBrush = new fabric.PencilBrush(canvas);
        addLayerToList('Draw')
        break;
    case "PenBrush":
        canvas.freeDrawingBrush = new fabric.PenBrush(canvas);
        addLayerToList('Draw')
        break;
    case "CircleBrush":
        canvas.freeDrawingBrush = new fabric.CircleBrush(canvas);
        addLayerToList('Draw')
        break;
    case "SprayBrush":
        canvas.freeDrawingBrush = new fabric.SprayBrush(canvas);
        addLayerToList('Draw')
        break;
    case "PatternBrush":
        canvas.freeDrawingBrush = new fabric.PatternBrush(canvas);
        addLayerToList('Draw')
        break;
    default:
        canvas.freeDrawingBrush = new fabric.PencilBrush(canvas); 
        addLayerToList('Draw')
}

}

/**
* UPADATING THE OBJECT PROPERTY PANEL
*/
canvas.on({
'object:rotating': update,
'object:moving': update,
'object:resizing': update
});

function update() {
let activeObject = canvas.getActiveObject();
if (!activeObject) return; // Check if there's an active object

let angleControl = document.getElementById('angle-control');
let borderRadius = document.getElementById('borderRadius');
let topControl = document.getElementById('Y-axis');
let leftControl = document.getElementById('X-axis');
let scaleX = document.getElementById('width');
let scaleY = document.getElementById('height');

// Check if properties needed for calculations exist
if (activeObject.angle !== undefined) {
    angleControl.value = Math.round(activeObject.angle);
}
if (activeObject.rx !== undefined) {
    borderRadius.value = Math.round(activeObject.rx); // Assuming rx and ry are the same
}
if (activeObject.top !== undefined) {
    topControl.value = Math.round(activeObject.top);
}
if (activeObject.left !== undefined) {
    leftControl.value = Math.round(activeObject.left);
}
if (activeObject.width !== undefined && activeObject.scaleX !== undefined) {
    scaleX.value = Math.round(activeObject.width * activeObject.scaleX);
}
if (activeObject.height !== undefined && activeObject.scaleY !== undefined) {
    scaleY.value = Math.round(activeObject.height * activeObject.scaleY);
}
}


var angleControl = document.getElementById('angle-control');
angleControl.oninput = function() {
let activeObject = canvas.getActiveObject();
if (!activeObject) return;

activeObject.set({
    angle: parseInt(this.value),
    centeredRotation: true
});
activeObject.setCoords();
canvas.requestRenderAll();
};

var borderRadius = document.getElementById('borderRadius');
borderRadius.oninput = function() {
let activeObject = canvas.getActiveObject();
if (!activeObject) return;

activeObject.set({
    rx: parseInt(this.value),
    ry: parseInt(this.value)
});
activeObject.setCoords();
canvas.requestRenderAll();
};

var topControl = document.getElementById('Y-axis');
topControl.oninput = function() {
let activeObject = canvas.getActiveObject();
if (!activeObject) return;

activeObject.set({
    top: parseInt(this.value)
});
activeObject.setCoords();
canvas.requestRenderAll();
};

var leftControl = document.getElementById('X-axis');
leftControl.oninput = function() {
let activeObject = canvas.getActiveObject();
if (!activeObject) return;

activeObject.set({
    left: parseInt(this.value)
});
activeObject.setCoords();
canvas.requestRenderAll();
};

var scaleX = document.getElementById('width');
scaleX.oninput = function() {
let activeObject = canvas.getActiveObject();
if (!activeObject) return;

let width = parseInt(this.value);
let originalWidth = activeObject.width;
let scaleXValue = width / originalWidth;
activeObject.scaleX = scaleXValue;
activeObject.setCoords();
canvas.requestRenderAll();
};

var scaleY = document.getElementById('height');
scaleY.oninput = function() {
let activeObject = canvas.getActiveObject();
if (!activeObject) return;

let height = parseInt(this.value);
let originalHeight = activeObject.height;
let scaleYValue = height / originalHeight;
activeObject.scaleY = scaleYValue;
activeObject.setCoords();
canvas.requestRenderAll();
};



let img; // Variable to store the image object

const imageInput = document.getElementById('imageInput');
imageInput.addEventListener('change', handleFileSelect);

function handleFileSelect(event) {
const file = event.target.files[0];
const reader = new FileReader();

reader.onload = function(e) {
const imageUrl = e.target.result;

fabric.Image.fromURL(imageUrl, function(image) {
  img = image;
  
  canvas.add(img);
  addLayerToList('Image');
  
});
img.set({
    zIndex: canvas.getObjects().length + 1 
})
};

reader.readAsDataURL(file);
}

const imgFilterSelect = document.getElementById('selectFilter');

imgFilterSelect.addEventListener('change', () => {
const selectedFilter = document.getElementById('selectFilter').value;

let filter;

switch (selectedFilter) {
case 'Polaroid':
  filter = new fabric.Image.filters.Polaroid();
  break;
case 'Sepia':
  filter = new fabric.Image.filters.Sepia();
  break;
case 'Grayscale':
  filter = new fabric.Image.filters.Grayscale();
  break;
case 'Invert':
  filter = new fabric.Image.filters.Invert();
  break;
default:
  alert('Filter not implemented');
  return;
}

var activeImg = canvas.getActiveObject();
if (activeImg){
activeImg.filters = [filter]; 
activeImg.applyFilters(); 
canvas.renderAll();
}
});

function applyFilter() {
const activeImg = canvas.getActiveObject(); // Get active object

if (activeImg) { // Ensure there's an active object
  let brightnessValue = parseInt(document.getElementById('brightness').value);
  let saturationValue = parseInt(document.getElementById('saturation').value);
  let contrastValue = parseInt(document.getElementById('contrast').value);
  let pixelateValue = parseInt(document.getElementById('pixelate').value);
  let blurValue = parseInt(document.getElementById('blur').value);

  activeImg.filters = []; // Clear existing filters

  if (brightnessValue !== 100) {
    activeImg.filters.push(new fabric.Image.filters.Brightness({
      brightness: (brightnessValue - 100) / 100 // Adjust brightness value to expected range
    }));
  }
  if (saturationValue !== 100) {
    activeImg.filters.push(new fabric.Image.filters.Saturation({
      saturation: (saturationValue - 100) / 100 // Adjust saturation value to expected range
    }));
  }
  if (contrastValue !== 100) {
    activeImg.filters.push(new fabric.Image.filters.Contrast({
      contrast: (contrastValue - 100) / 100 // Adjust contrast value to expected range
    }));
  }
  if (pixelateValue !== 100) {
    activeImg.filters.push(new fabric.Image.filters.Pixelate({
      blocksize: pixelateValue
    }));
  }
  if (blurValue !== 100) {
    activeImg.filters.push(new fabric.Image.filters.Blur({
      blur: blurValue
    }));
  }

  activeImg.applyFilters();
  canvas.renderAll();
}
}

document.getElementById('brightness').addEventListener('input', applyFilter);
document.getElementById('saturation').addEventListener('input', applyFilter);
document.getElementById('contrast').addEventListener('input', applyFilter);
document.getElementById('pixelate').addEventListener('input', applyFilter);
document.getElementById('blur').addEventListener('input', applyFilter);


function addLayerToList() {
// Clear the existing layer list
layerList.innerHTML = '';

// Get the current active object
const activeObject = canvas.getActiveObject();

// Iterate over each object on the canvas
canvas.getObjects().forEach((obj, index) => {
    const li = createLayerListItem(obj, index);
    layerList.appendChild(li);
});

// Restore the active object if it exists
if (activeObject) {
    canvas.setActiveObject(activeObject);
    canvas.renderAll();
}

// Initialize the sortable list
initializeSortable();

}

function createLayerListItem(obj, index) {
const li = document.createElement('li');
const div1 = document.createElement('div');
const div2 = document.createElement('div');
const textSpan = document.createElement('span');
li.className = "list-group-item list-btn ";

const icon1 = document.createElement('img');
icon1.className = 'icon';
icon1.src = obj.visible ? 'images/svg/eye-open.svg' : 'images/svg/eye-closed.svg';
icon1.addEventListener('click', (event) => {
    toggleVisibility(obj, icon1);
    event.stopPropagation();
});

const icon2 = document.createElement('img');
icon2.className = 'icon lock-icon';
icon2.src = obj.selectable ? 'images/svg/lock-open.svg' : 'images/svg/lock-close.svg';
icon2.addEventListener('click', (event) => {
    toggleLock(obj, icon2);
    event.stopPropagation();
});

textSpan.textContent = `${obj.type} ${index + 1}`;
li.addEventListener('click', () => {
    canvas.setActiveObject(obj);
    canvas.renderAll();
    updateLayerList();
});

if (canvas.getActiveObject() === obj) {
    li.classList.add('selected');
}

div1.appendChild(textSpan);
div2.appendChild(icon1);
div2.appendChild(icon2);
li.appendChild(div1);
li.appendChild(div2);

// Ensure new objects inherit correct properties
if (obj.selectable === undefined) {
    obj.selectable = true;
}
if (obj.visible === undefined) {
    obj.visible = true;
}

return li;
}

function toggleVisibility(obj, icon) {
obj.visible = !obj.visible;
icon.src = obj.visible ? 'images/svg/eye-open.svg' : 'images/svg/eye-closed.svg';
canvas.renderAll();
}

function toggleLock(obj, icon) {
obj.selectable = !obj.selectable;
icon.src = obj.selectable ? 'images/svg/lock-open.svg' : 'images/svg/lock-close.svg';
canvas.renderAll();
}

function updateLayerList() {
canvas.getObjects().forEach((obj, index) => {
    const li = layerList.children[index];
    if (canvas.getActiveObject() === obj) {
        li.classList.add('selected');
    } else {
        li.classList.remove('selected');
    }
    // Update lock icon based on object's lock state
    const lockIcon = li.querySelector('.lock-icon');
    lockIcon.src = obj.selectable ? 'images/svg/lock-open.svg' : 'images/svg/lock-close.svg';
});

}

function initializeSortable() {
Sortable.create(layerList, {
    animation: 200,
    ghostClass: 'blue-background-class',
    onUpdate: function (event) {
        const items = event.to.children;
        const newObjectsOrder = [];

        // Iterate over sorted list and get new order of objects
        for (let i = 0; i < items.length; i++) {
            const index = parseInt(items[i].textContent.split(' ')[1]) - 1;
            newObjectsOrder.push(canvas.item(index));
        }
        canvas.clear();
        newObjectsOrder.forEach(obj => {
            canvas.add(obj);
        });
        canvas.backgroundColor='#E6E6E6';                                                                                                               
        addLayerToList();
    }
});
}


/**
* UNDO , REDO  &  DELETE FUNCTIONALITY
*/


function undo() {
canvas.undo();
addLayerToList();
console.log("Undo completed");
}

function redo() {
canvas.redo();
addLayerToList();
}

document.addEventListener('keydown', function(event) {
if (event.ctrlKey && event.key === 'z') {
    undo();
}
if (event.ctrlKey && event.key === 'y') {
    redo();
}
});

function removeObject() {
document.addEventListener('keydown', function (e) {
    var activeObject = canvas.getActiveObject();
    if (activeObject && (e.key === 'Delete' || e.key === 'Backspace') && activeObject.type !== 'textbox') {
        const index = canvas.getObjects().indexOf(activeObject);
        if (index !== -1) {
            const objectState = activeObject.toJSON();
            canvas.remove(activeObject);
            canvas.renderAll();
            layerList.removeChild(layerList.children[index]);
            
        }
    }
});
}

removeObject();




/**
*  FUNCTION FOR THE DOWNLOAD THE IMAGES.
*/
// let acvtiveObject=canvas.getActiveObject();
let pngBtn = document.getElementById('pngBtn');
pngBtn.addEventListener('click', () => {
downloadImg('png', 1);
});

let jpgBtn = document.getElementById('jpgBtn');
jpgBtn.addEventListener('click', () => {
downloadImg('jpg', 1);
});

let svgBtn = document.getElementById('svgBtn');
svgBtn.addEventListener('click', () => {
downloadImg('svg', 1);
});

function downloadImg(format, quality) {
let dataURL;
let link = document.createElement('a');
let fileName = 'Untitled.' + format;

if (format === 'svg') {
    // Create a temporary SVG element
    let svg = new fabric.StaticCanvas(null, {width: canvas.width, height: canvas.height});

    // Add objects from main canvas to the temporary SVG canvas
    for (let obj of canvas.getObjects()) {
        let clone = fabric.util.object.clone(obj);
        svg.add(clone);
    }

    // Convert SVG to data URL
    dataURL = 'data:image/svg+xml;utf8,' + encodeURIComponent(svg.toSVG());
} else {
    // Create a temporary canvas to draw only the objects
    let tempCanvas = document.createElement('canvas');
    let tempCtx = tempCanvas.getContext('2d');
    tempCanvas.width = canvas.width;
    tempCanvas.height = canvas.height;

    // Clear temporary canvas
    tempCtx.clearRect(0, 0, tempCanvas.width, tempCanvas.height);

    // Draw only the objects from the main canvas onto the temporary canvas
    for (let obj of canvas.getObjects()) {
        tempCtx.save();
        obj.render(tempCtx);
        tempCtx.restore();
    }

    // Convert canvas to data URL
    dataURL = tempCanvas.toDataURL('image/' + format, quality);
}

// Construct the download link
link.href = dataURL;
link.download = fileName;

// Trigger the download
document.body.appendChild(link);
link.click();
document.body.removeChild(link);
}

/**
* OBJECT COPY AND PEST
* 
*/

function copiedObject(obj) {
obj.clone(function(clonedObj) {
  clonedObj.set({
    left: obj.left + 10,
    top: obj.top + 10
  });
  canvas.add(clonedObj);
  canvas.setActiveObject(clonedObj);
  canvas.renderAll();
});
}

document.addEventListener('keydown', function (e) {
if (e.ctrlKey && e.key === 'c') {
  var activeObject = canvas.getActiveObject();
  if (activeObject) {
    fabric.util.clipboard = activeObject;
  }
} else if (e.ctrlKey && e.key === 'v') {
  if (fabric.util.clipboard) {
    copiedObject(fabric.util.clipboard);
  }
}
});

/**
*  PROPERTY EVENT HANDLING 
* 
*/

// 
let positioningSizing = document.getElementById('positioning-sizing');
let textPropertyPanel = document.getElementById('text-editor');
let imgEditorPanel = document.getElementById('imgEditorPanel');
let colorPanel = document.getElementById('color-panel');
let canvasColor=document.getElementById('canvas-color');
let imgEditorPropertyPanel = document.getElementById('imgEditorPropertyPanel');
// Assuming you have a canvas element with id 'canvas'

canvas.on({ 
          'selection:created': showPropertyPanel,
          'selection:updated':showPropertyPanel,
          'selection:cleared': hidePropertyPanel,
     });

     function showPropertyPanel(event) {
        if (event && event.selected && event.selected.length > 0) {
            let obj = event.selected[0]; 
            console.log('Selected object type:', obj.type); 
            if (obj.type === 'textbox') {
                textPropertyPanel.style.display = 'block';
            } 
            
            positioningSizing.style.display = 'block';
            imgEditorPanel.style.display = 'none';
            colorPanel.style.display = 'block';
            canvasColor.style.display = 'none';
          
        } else {
            hidePropertyPanel();
            canvasColor.style.display = 'block';
        }
    }
    
    
    function hidePropertyPanel() {
        positioningSizing.style.display = 'none';
        canvasColor.style.display= 'block';
        colorPanel.style.display='none';
        textPropertyPanel.style.display = 'none';
    }  
    
/**
* 
* DEACTIVATING THE MOUSE MOVMENT 
*/  
function deactivateMouseEvent(o) {
canvas.getObjects().forEach(o => {
    o.selectable = true;
    o.hasBorders = true;
    o.hasControls =true;
    canvas.selection=true;
});
canvas.off({
    'mouse:down': addingShapeOnMouseDown,
    'mouse:move': drawingShapeOnMouseMove,
    'mouse:up': stopShapeOnMouseUp,
});
canvas.off({ 
    'mouse:down':addingCircleMouseDown,
    'mouse:move': drawingCircleMouseMove,
    'mouse:up':stopCircleMouseUp, 
     });
canvas.off({
    'mouse:down': addingRectangleMouseDown,
    'mouse:move':drawingRectangleMouseMove,
     'mouse:up':stopRectangleMouseUp
    });
canvas.off({ 
    'mouse:down' : addingStarShapeMouseDown,
    'mouse:move' : drawingStarShapeMouseMove,
    'mouse:up' : stopStarBtnMouseUp
    });
canvas.off({ 
    'mouse:down': addingTrianglShapeMouseDown,
    'mouse:move':drawingTriangleShapeMouseMove,
    'mouse:up': stopTriangleBtnMouseUp
});
canvas.off({
    'mouse:down':startAddingText,
    'mouse:up':stopAddingText,
});

}


/**
* STORE THE CANAVS STATE IN THE DATABASE
*/



jQuery(document).ready(function($) {
    // Define canvas variable or pass it as an argument to the function


    window.saveCanvasState = function() {
        var imageData = canvas.toDataURL("image/png");
        var canvasState = canvas.toJSON();
        
        $.ajax({
            url: 'php-files/saveCanvas.php',
            type: 'POST',
            data: { 
                imageData: imageData,
                canvasState: JSON.stringify(canvasState)
            },
            success: function(response) {
                console.log(response); // Log the response from the server
                alert('Canvas image and state saved successfully!');
            },
            error: function(xhr, status, error) {
                console.error('Error saving image and state:', error); 
            }
        });
    }
    
  
  $('#saveCanvasState').click(function() {
        saveCanvasState();
        
    });
});





