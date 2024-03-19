/// VERSION 1.0
// Game engine settings
var GameEngine = {
    debug: false,
    logFps: false
}

// Object Related
class GameObject {
    Name;
    Position;
    collision;
    color;
    delOnColide = false;
    Updater = false;
    constructor(locX, locY, height, width, color, collision) {
        this.Position = new position(locX, locY, height, width);
        this.collision = collision;
        this.color = color;
    }
}
class TextObject {
    Name;
    Position;
    color;
    text;
    font;
    constructor(locX, locY, color, text, font){
        this.Position = new position(locX, locY, 0, 0);
        this.color = color;
        this.text = text;
        this.font = font;
    }
}
var GameObjects = {};
var TextObjects = {};
/// Create an game object
function CreateObject(name, object){
    GameObjects[name] = object;
    GameObjects[name].name = name;
    log(`Object Created ${name}`);
}
/// Create a text object
function createTextObj(name, object) {
    TextObjects[name] = object;
    TextObjects[name].name = name;
    log(`Text Object Created ${name}`);
}
/// Delete a game object
function DeleteObject(name){
    delete GameObjects[name];
    log(`Deleted ${name} object`)
}
/// Delete a text object
function DeleteTextObj(name){
    delete TextObjects[name];
    log(`Deleted ${name} text object`)
}
class position{
    height;
    width;
    locX;
    locY;
    constructor(locX, locY, height, width) {
        this.height = height;
        this.width = width;
        this.locX = locX;
        this.locY = locY;
    }
}

/// RENDERING

// Canvas selection
var canvas;
var ctx;
var canvas_width;
var canvas_height;
// Other canvas vars
var backgroundColor;
function selectCan(canvasName, color){
    canvas = document.getElementById(canvasName);
    ctx = canvas.getContext("2d");
    backgroundColor = color;
    canvas_width = canvas.offsetWidth;
    canvas_height = canvas.offsetHeight;
}
function render(){
    // Render plain background
    DebugLog("Rendering Frame");
    ctx.fillStyle = backgroundColor;
    ctx.fillRect(0, 0, canvas_width, canvas_height);
    for (const [key, value] of Object.entries(GameObjects)) {
        if(typeof value.image !== 'undefined'){
            ctx.drawImage(value.image, value.Position.locX, value.Position.locY, 
            value.Position.width, value.Position.height);
        }else{
            ctx.fillStyle = value.color;
            ctx.fillRect(value.Position.locX, value.Position.locY, 
            value.Position.width, value.Position.height);
        }
    }
    for (const [key, value] of Object.entries(TextObjects)) {
        ctx.font = value.font;
        ctx.fillStyle = value.color;
        ctx.fillText(value.text, value.Position.locX, value.Position.locY);
    }
}

// Engine loop, calls all sub functions of the engine
var lastCalledTime;
var NumTime = 0;
var fps;
function EngineLoop(){
    for (const [key2, ObjectBeingChecked] of Object.entries(GameObjects)) {
        if(ObjectBeingChecked.Updater == true){
            ObjectBeingChecked.OnUpdate(); // If it has a OnUpdate call it
        }
    }
    CollisionCheck();
    render();
    if(GameEngine.logFps){
        if(!lastCalledTime) {
            lastCalledTime = Date.now();
            fps = 0;
            return;
        }
        var delta = (Date.now() - lastCalledTime)/1000;
        lastCalledTime = Date.now();
        fps = 1/delta;
        if(NumTime == 50) {
            log(fps);
            NumTime = 0;
        }else{
            NumTime++;
        }
    }
}

/// Input Binding handle
var inputsBound={};
function addInputBind(code, func, obj = ""){
    inputsBound[code] = [obj, func];
    log(`Bound ${code} to ${obj}.${func}`);
}
document.addEventListener('keydown', (event) => {
    var name = event.key;
    var code = event.code;
    DebugLog(code);
    DebugLog(name);
    if (code in inputsBound || name in inputsBound){
        if(inputsBound[code][0] == ""){
            eval(`${inputsBound[code][1]}()`);
        }else{
            eval(`${inputsBound[code][0]}.${inputsBound[code][1]}()`);
        }
    }
}, false);
function removeInputBind(code){
    delete inputsBound[code];
    log(`Unbound ${code}`);
}

/// Collision and physics
function CollisionCheck(){
    for (const [key1, ObjectChecking] of Object.entries(GameObjects)) {
        if(!ObjectChecking.collision){
            continue;
        }
        else{
            for (const [key2, ObjectBeingChecked] of Object.entries(GameObjects)) {
                if(!ObjectBeingChecked.collision || ObjectBeingChecked.name == ObjectChecking.name){
                    continue;
                }
                if(ObjectChecking.Position.locX > ObjectBeingChecked.Position.locX && 
                     ObjectChecking.Position.locX + ObjectChecking.Position.width < ObjectBeingChecked.Position.locX + ObjectBeingChecked.Position.width ||
                     ObjectChecking.Position.width + ObjectChecking.Position.locX > ObjectBeingChecked.Position.locX &&
                     ObjectChecking.Position.locX + ObjectChecking.Position.width < ObjectBeingChecked.Position.locX + ObjectBeingChecked.Position.width
                     || ObjectChecking.Position.locX > ObjectBeingChecked.Position.locX && 
                     ObjectChecking.Position.locX < ObjectBeingChecked.Position.locX + ObjectBeingChecked.Position.width){
                    // Within the width of the object
                    if(ObjectChecking.Position.locY > ObjectBeingChecked.Position.locY &&
                         ObjectChecking.Position.locY + ObjectChecking.Position.height < ObjectBeingChecked.Position.locY + ObjectBeingChecked.Position.height 
                         || ObjectChecking.Position.height + ObjectChecking.Position.locY > ObjectBeingChecked.Position.locY && 
                         ObjectChecking.Position.locY + ObjectChecking.Position.height < ObjectBeingChecked.Position.locY + ObjectBeingChecked.Position.height
                         || ObjectChecking.Position.locY < ObjectBeingChecked.Position.locY + ObjectBeingChecked.Position.height 
                         && ObjectChecking.Position.locY > ObjectBeingChecked.Position.locY){
                        // Within the height of the object
                        if(ObjectChecking.OnColide instanceof Function){
                            ObjectChecking.OnColide(ObjectBeingChecked); // If it has a oncolide, call it
                            if(ObjectChecking.delOnColide == true){
                                DeleteObject(ObjectChecking.name);
                                break;
                            }
                        }
                    }
                }
            }
        }
    }
}

// Debug Functions
function DebugLog(){
    if(GameEngine.debug){
        var text = "DEBUG:";
        let args = Array.from(arguments);
        for(item in args){
            text = text + " " + args[item];
        }
        console.log(text);
    }
}
function log(){
    var text = "";
    let args = Array.from(arguments);
    for(item in args){
        text = text + " " + args[item];
    }
    console.log(text);
}