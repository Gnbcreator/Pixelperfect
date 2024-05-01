<?php 
session_start();
include 'php-files/signupdata.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.14.0/Sortable.min.js"></script>
    <link rel="stylesheet" href="bootstrap/bootstrap.css">
    <link rel="stylesheet" href="bootstrap/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="bootstrap/js/bootstrap.min.js">
    <link rel="stylesheet" href="css/Newcanva.css">
    <link  href="dashboard">

    <title>New Design </title>
</head>
<body  >
    <div class="container-fluid p-0"> 
        <!-- headder started -->
        <div class="container-fluid p-0 m-0  fixed-top">
           <div class="row navbar bg-dark p-0 m-0 mt]">

              <div class="col-md-8 d-flex ">
                
                     <div class="btn-group">
                        <button type="button" class="btn btn-outline-primary  border-0 rounded-1" data-bs-toggle="tooltip" data-bs-custom-class="tooltip-color" id="MoveTool"><img src="images/white-Icons/icons8-cursor-32.png" class="tool-icon-size"></button>
                        <button type="button" class=" btn dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown"><img src="images/white-Icons/icons8-down-16.png" alt=""></button>
                        
                      </div>
                      <div class="btn-group">
                        <button type="button" class="btn btn-outline-primary  border-0 rounded-1" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Shapes" id="rectangle"><img src="images/white-Icons/icons8-rectangle-48.png" class="tool-icon-size"></button>
                        <button type="button" class=" btn dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown"><img  src="images/white-Icons/icons8-down-16.png" alt=""></button>
                        <ul class="dropdown-menu dropdown-menu-dark rounded-0 p-0">
                          <li><a class="dropdown-item btn btn-outline-primary  border-0 rounded-1" id="lineBtn"><img src="images/white-Icons/icons8-line-50.png" id="lineBtn"> line</a></li>
                          <li><a class="dropdown-item btn btn-outline-primary  border-0 rounded-1" id="circle"><img src="images/white-Icons/icons8-circle-50.png"> circle</a></li>
                          <li><a class="dropdown-item btn btn-outline-primary  border-0 rounded-1" id="star"><img src="images/white-Icons/icons8-star-50.png"> Star</a></li>
                          <li><a class="dropdown-item btn btn-outline-primary  border-0 rounded-1" id="triangle"><img src="images/white-Icons/icons8-triangle-32.png ">Triangle</a></li>
                          <li><a class="dropdown-item btn btn-outline-primary  border-0 rounded-1" id="arrowBtn1"><img src="images/white-Icons/icons8-arrow-32.png" id="arrowBtn">Arrow</a></li>
                          <li><a class="dropdown-item btn btn-outline-primary  border-0 rounded-1" id="arrowBtn2"><img src="images/white-Icons/icons8-arrow-32.png" id="arrowBtn2"> Double Arrow</a></li>
                          <hr>
                          <li><img src="images/white-Icons/icons8-image-32.png" style="margin-left: 10px;">
                            <input type="file" id="imageInput">
                             <button class=" btn text-white" onclick="document.getElementById('imageInput').click()">Image</button>
                          </li>
                           
                        </ul>
                      </div> 
                      <div class="btn-group " ">
                          <button type="button" class="btn btn-outline-primary  border-0 rounded-1" data-bs-toggle="tooltip" data-bs-custom-class="tooltip-color" id="drawing-mode"><img src="images/white-Icons/icons8-brush-tool-32.png" class="tool-icon-size"></button>
                          <button type="button" class=" btn dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown"></button>
                            
                      </div>
                      <div class="btn-group">
                        <button type="button" class="btn  btn-outline-primary  border-0 rounded-1 " data-bs-toggle="tooltip" data-bs-custom-class="tooltip-color" id="selctionBtn"><img src="images/white-Icons/icons8-selection-64.png" class="tool-icon-size"></button>
                        <button type="button" class=" btn dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown"></button>
                       
                      </div>
                      
                      <div class="btn-group">
                        <button type="button" class="btn btn-outline-primary  border-0 rounded-1 " data-bs-toggle="tooltip" data-bs-custom-class="tooltip-color" id="textBtn"><img src="images/white-Icons/icons8-text-24.png" class="tool-icon-size"></button>
                        <button type="button" class=" btn dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown"></button>
                        
                      </div>
                      <div class="btn-group">
                        <button type="button" class="btn btn-outline-primary  border-0 rounded-1" data-bs-toggle="tooltip" data-bs-custom-class="tooltip-color" ><img src="images/white-Icons/icons8-aspect-ratio-32.png" class="tool-icon-size"></button>
                        <button type="button" class=" btn dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown"><img src="images/white-Icons/icons8-down-16.png" alt=""></button>
                        <ul class="dropdown-menu dropdown-menu-dark rounded-0 p-0">
                             <li class=" dropdown-item font" id="Desktop"     >Deskstop</li>
                             <li class=" dropdown-item font" id="MackBookAir" >Mackbook air </li>
                             <li class=" dropdown-item font" id="MackBookPro">Mackbook Pro</li>
                             <li class=" dropdown-item font" id="iphone13Pro">iphone 13 pro </li>
                             <li class=" dropdown-item font" id="iphone14pro">iphone 14 Pro</li>
                             <li class=" dropdown-item font" id="iphone15pro">iphone 15 pro pluse</li><hr>
                             <li class=" dropdown-item font" id="samsunggalexyS21ultra">samsung galexy S21 ultra</li>
                             <li class=" dropdown-item font" id="ipadPro">ipad Pro</li>
                        </ul>
                      </div>
                      <div class="btn-group">
                        <button onclick="undo()" type="button " class="btn btn-outline-primary  border-0 rounded-1" id="undoBtn"><img src="images/white-Icons/icons8-undo-50.png" class="icon-size"></button>
                        <button onclick="redo()" type="button" class="btn btn-outline-primary  border-0 rounded-1"  id="redoBtn"><img src="images/white-Icons/icons8-redo-50.png" class="icon-size"></button>
                        
                      </div>
                  </div>
                  <div class="col-md-3 d-flex justify-content-evenly">
                         <div class="btn-group">
                          <button class="btn btn-primary" >Export</button>
                          <button class="btn btn-primary dropdown-toggle-split dropdown-toggle" data-bs-toggle="dropdown"></button>
                             <div class=" dropdown-menu rounded-2 py-0 ">
                               <ul class="list list-group list-group-flush " >
                                <li><a class=" list-group-item " id="pngBtn" >PNG</a></li>
                                <li><a class=" list-group-item " id="jpgBtn" >JPG</a></li>
                                <li><a class=" list-group-item " id="svgBtn" download="">SVG</a></li>
                               </ul>
                             </div>
                         </div>
                         <form action="#" method="post">
                          <button class="btn btn-outline-info"  type="button" id="saveCanvasState" >Save</button>
                          <a class="email" style="display: none;" href=""><?php echo $_SESSION['email'];?></a>

                      </form>                          
                      </div>
           </div>
        </div>
         <!-- headder end -->

          <!-- hero started -->
       <div class="container-fluid p-0 container-2">
           <div class="container-fluid p-0 d-flex jsu main-container">
                    
                   <!-- LAYER PANEL -->
                    <div class="Left-side-panel ">
                      <p class="secondary-text txt- text-center p-1">Layers</p>
                       <div class="layerPanel">
                           <ul class=" list-group-flush list-group" id="layerList">
                               <!-- adding layers dynimacli -->
                             
                              
                           </ul>
                       </div>
                    </div>
                    
                    <!-- MAIN-CANVAS -->
                    <div class=" container-fluid canvas-container p-0" id="canvas-container">
                      <canvas id="myCanvas" >
                          
                      
                      </canvas> 
                     </div>

                     <!-- PROPERTY PANEL -->
                      <!-- ALIGNMENT -->
                    <div class="Right-side-panel">
                        <div class="row px-3 py-3" >
                          <label for="secondary-text">Design & Property</label>
                             <div class="col-12 ">
                                 <div class="btn-group">
                                  <button class="btn rounded-1 disabled border-0" value="left" id="align-left"><img src="images/image/icons8-align-left-24.png" class="prop-icon"></button>
                                  <button class="btn rounded-1 disabled border-0" value="center" id="align-center"><img src="images/image/icons8-align-center-24.png"      class="prop-icon"></button>
                                  <button class="btn rounded-1 disabled border-0" value="right" id="align-right"><img src="images/image/icons8-align-right-24.png"  class="prop-icon"></button>
                                  <button class="btn rounded-1 disabled border-0" value="top" id="align-top"><img src="images/image/icons8-align-left-24.png" class="prop-icon" style="transform: rotate(90deg); "></button>
                                  <button class="btn rounded-1 disabled border-0" value="center" id="align-center"><img src="images/image/icons8-align-center-24.png" class="prop-icon" style="transform: rotate(90deg);"></button>
                                  <button class="btn rounded-1 disabled border-0" value="bottom" id="align-bottom"><img src="images/image/icons8-align-right-24.png" class="prop-icon" style="transform: rotate(90deg);"></button>
                                 </div>
                                 
                             </div>
                             <hr>
                             
                             <!-- SIZIG -->
                            <div id="positioning-sizing" class="size-positons">
                              <p class="secondary-text">Sizng & Positioning</p>
                              <div class="size-section d-flex justify-content-lg-evenly " style="margin-left: 10px;">
                                  <div class=" d-flex justify-content-lg-evenly">
                                    <span class="font d-flex px-2">width:</span>
                                    <input type="number" class="form-control" id="width" inputmode="none" >
                                  </div>
                                  <div class=" d-flex  justify-content-lg-evenly ">
                                    <span  class="font d-flex px-2">height:</span>
                                    <input type="number" class=" form-control" id="height">
                                  </div>
                              </div>
                              
                              <!-- POSITIONING -->
                              
                              <div class="position-section mt-2 d-flex justify-content-evenly"  style="margin-left: 10px;">
                                <div class=" d-flex justify-content-evenly ">
                                  <span class="font d-flex px-2">Xaxis:</span>
                                  <input type="number" class="form-control" id="X-axis"  >
                                </div>
                                <div class=" d-flex  justify-content-evenly ">
                                  <span  class="font d-flex px-2 me-2">Yaxis:</span>
                                  <input type="number" class=" form-control" id="Y-axis">
                                </div>
                               </div>
 
                              <!-- ANGLES&CURVES -->
                              <div class="position-section mt-2 d-flex justify-content-evenly"  style="margin-left: 10px;">
                                <div class=" d-flex justify-content-evenly ">
                                  <span class="font d-flex px-2 me-4"><img src="images/icons/angle.png" style="width:18px; height:18px" ></span>
                                  <input type="number" class="form-control" id="angle-control"  >
                                </div>
                                <div class=" d-flex  justify-content-evenly ">
                                  <span  class="font d-flex px-2  me-4"><img src="images/icons/round-corner.png" style="width:20px; height:20px ;" ></span>
                                  <input type="number" class=" form-control" id="borderRadius">
                                </div>
                               </div>
                               <hr class="mt-3 mx-1">
                            </div>
                            <!-- CANVAS COLORING -->
                            <div id="canvas-color">
                              <div class="d-flex">
                                <span class="me-1">Page</span>
                                <input type="color" class="color-filler border-0 d-flex " id="colorPicker" >
                               </div>
                             </div>
                            <!-- COLORING -->
                            <div  id="color-panel">
                                <p class="secondary-text">Colors</p>
                                    <div class="d-flex justify-content-evenly">
                                       <div class="d-flex justify-content-evenly">
                                         <span class="me-1">Fill</span>
                                         <input type="color" class="color-filler rounded-5 border-0 c" id="FillColor" >
                                       </div>
                                       <div class="d-flex justify-content-evenly">
                                          <span class="me-1">Strok</span>
                                          <input type="color" class="color-filler rounded-4 border-0" id="StrokeColor" >
                                       </div>
                                   </div>
                                   
                                   <hr class="mt-3 mx-1">
                                  </div>

                             <!-- TEXT EDITOR -->
                              <!-- Fonts -->
                            <div  id="text-editor" >
                              <p class="secondary-text">Font & Style </p>
                              <div class="d-flex justify-content-around" >
                                <div class="font-box">
                                  <select class=" form-select" id="fontFamilys">
                                  </select>
                               </div>
                               <div class="d-flex">
                                    <select class=" form-select-sm  text-start" id="font-size" style="padding-right:30px;">
                                         <option value="1">1</option>
                                         <option value="9">9</option>
                                         <option value="10">10</option>
                                         <option value="12">12</option>
                                         <option value="14">14</option>
                                         <option value="16">16</option>
                                         <option value="18">18</option>
                                         <option value="20">20</option>
                                         <option value="22">22</option>
                                         <option value="24">24</option>
                                         <option value="26">26</option>
                                         <option value="28">28</option>
                                         <option value="36">36</option>
                                         <option value="48">48</option>
                                         <option value="72">72</option>
                                         <option value="80">80</option>
                                         <option value="85">85</option>
                                         <option value="90">90</option>
                                         <option value="95">95</option>
                                         <option value="100">100</option>
                                    </select>
                                </div>
                            </div>
                            <div class="text-style d-flex mt-2 " >
                              <select class=" form-select-sm  me-3 " id="font-weight">
                                    <option value="400">Normal</option>
                                    <option value="900">Extra Bold</option>
                               </select>
                                 <div class="text-edit d-flex justify-content-evenly mt-2">
                                     <button class="btn btn-sm rounded-1 me-3 " id="style-bold"><img class="prop-icon2"  src="images/icons/bold.png"></button>
                                     <button class="btn btn-sm rounded-1 me-3 " id="style-italic"><img class="prop-icon2"  src="images/icons/italic.png" ></button>
                                     <button class="btn btn-sm rounded-1 me-3 " id="style-underline"><img class="prop-icon2"  src="images/icons/underline.png"></button>
                                 </div>
                             </div>
                             <hr class="mt-1">
                            </div>


                            <!-- Brush property -->

                            <div id="drawing-property-panel" style="margin-left:4px;" id="type">
                                <div class="drawing-mode-options">
                                   <select class=" form-select" id="type">
                                       <option value="PencilBrush">Pencil</option>
                                       <option value="PenBrush">Pen</option>
                                       <option value="SprayBrush">Brush</option>
                                       <option value="PatternBrush">pattern</option>
                                       <option value="SprayBrush">Spray</option>
                                       <option value="texture">Texture</option>
                                   </select>
                                </div>
                                <label for="line-width" class="font py-1 mt-0">Line width : <input type="range" min="1" max="150" id="drawing-line-width" style="margin-left: 20px;"></label>
                                <label for="line-width" class="font py-1 mt-0">Shadow width:<input type="range"  min="0" max="150" id="drawing-shadow-width" style="margin-left: 4px;"></label>
                            </div>
                       
                            <!--IMG EDITOR -->
                          <div class="col-12" id="imgEditorpropertyPanel" class="propertyPanel">
                                <label for=""> Layers</label>
                                 <select name="" class=" form-select" id="selectFilter">
                                  <option value="Polaroid">Polaroid</option>
                                  <option value="Sepia">Sepia</option>
                                  <option value="Grayscale">Grayscale</option>
                                  <option value="Invert">Invert</option>
                                </select>
                             <hr>
                            
                            <hr>
                              <div class="btn-group" id="imgEditorPanel">
                                <button type="button" class="btn rounded-0 " data-bs-toggle="dropdown" aria-expanded="false">Image</button>
                                <ul class="dropdown-menu rounded-0 px-3 border-0" id="imgEditor">
                                    <label>Brightness : <input type="range" id="brightness" class=" form-range" value="1" min="-100" max="100" step="1"></label>
                                    <label>Saturation : <input type="range" id="saturation" class=" form-range" min="-100" max="100"  value="100" step="1"></label>
                                    <label>Contrast : <input type="range"   id="contrast" class=" form-range" min="-100" max="100"  value="100" step="1"></label>
                                    <label>Pixlet : <input type="range"     id="pixelate" class=" form-range" min="-100" max="100"  value="100" step="1"></label>
                                    <label>Blure : <input type="range"      id="blur" class=" form-range" min="-100" max="100"  value="100" step="1"></label>
                                </ul>
                              
                              </div>
                            </div>
                            <hr class="mt-2">
                          

                        </div>
                    </div>
                    <!-- PROPERTY PANEL END-->
           </div>
       </div> 
        <!--hero ended -->
    </div>
    <script src="js/Sortable.js"></script>
    <script src="js/fabric.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fabric-history@1.7.0/src/index.min.js"></script>
    <script src="js/newcanvas.js"></script>

</body>
</html>