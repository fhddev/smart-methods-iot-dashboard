<script>
/**
|
|
|
|
|
|
|
|
|
|
    properties
|
|
|
|
|
|
|
|
|
|
//////////////////////////////////////////////////////////////////////// */

var boardId,
board,
bContext,
bgImage,
bgImageUrl,
robotImage,
robotImageUrl,
robotStartX,
robotStartY,
robotWidth,
robotHeight,
robotX,
robotY,
moveSpeed,
sideForward,
sideBackward,
sideRight,
sideLeft,
oneMeterInPixels;

/**
|
|
|
|
|
|
|
|
|
|
    functions
|
|
|
|
|
|
|
|
|
|
//////////////////////////////////////////////////////////////////////// */

function init(boardIdSelector, bgImageUrlString, rImageUrl, rStartX, rStartY, rWidth, rHeight){
    // debugger;
    boardId = boardIdSelector;
    board = document.getElementById(boardId);
    bContext = board.getContext('2d');
    bgImageUrl = bgImageUrlString;
    robotImageUrl = rImageUrl;
    robotStartX = rStartX;
    robotX = robotStartX;
    robotStartY = rStartY;
    robotY = robotStartY;
    robotWidth = rWidth;
    // <span>Photo by <a href="https://unsplash.com/@hauntedeyes?utm_source=unsplash&amp;utm_medium=referral&amp;utm_content=creditCopyText">Lukas</a> on <a href="https://unsplash.com/?utm_source=unsplash&amp;utm_medium=referral&amp;utm_content=creditCopyText">Unsplash</a></span>
    robotHeight = rHeight;
    moveSpeed = 10;
    sideForward = 'Forward';
    sideBackward = 'Backward';
    sideRight = 'Right';
    sideLeft = 'Left';
    oneMeterInPixels = 100; // 100 pixel = 1 meter
    
    bgImage = new Image();

    bgImage.src = bgImageUrl;
    bgImage.onload = function(){
        bContext.drawImage(bgImage, 0, 0);

        // draw robot
        robotImage = new Image();
        robotImage.src = robotImageUrl;
        robotImage.onload = function() {
            bContext.drawImage(robotImage, robotStartX, robotStartY, robotWidth, robotHeight);
        };
    };
}

function drawBoard(rX, rY){
    bContext.clearRect(0, 0, board.width, board.height);
    bContext.drawImage(bgImage, 0, 0);
    bContext.drawImage(robotImage, rX, rY, robotWidth, robotHeight);
}

// steps = pixels | 1 step = 1 pixel
function moveAStep(direction, steps){
    switch(direction){
        case sideForward:
            robotY = robotY + steps;
            break;
        case sideBackward:
            robotY = robotY - steps;
            break;
        case sideRight:
            robotX = robotX + steps;
            break;
        case sideLeft:
            robotX = robotX - steps;
    }

    drawBoard(robotX, robotY);
}

function moveAMeter(direction, meters){
    return new Promise(function(resolve, reject){
        var i = 0;
        var stepsCount = (meters * oneMeterInPixels);

        function move() {
            moveAStep(direction, 1);
            if (i++ < stepsCount) {
                setTimeout(move, moveSpeed);
            } else {
                resolve()
            }
        }

        move()
    })
}

/**
    var directions = [
        {side: "Forward", meters: 1},
        {side: "Right", meters: 4},
        {side: "Forward", meters: 1},
    ];

    Example:
        var directions = [
            {side: "Forward", meters: 1},
            {side: "Right", meters: 4},
            {side: "Forward", meters: 1},
        ];
        moveToDestination(directions).then(() => console.log('done'))
 */
async function moveToDestination(route){
    for(var i=0; i<route.length; i++)
        await moveAMeter(route[i].side, route[i].meters)
}

/**
|
|
|
|
|
|
|
|
|
|
    calls
|
|
|
|
|
|
|
|
|
|
//////////////////////////////////////////////////////////////////////// */

// init(
//     "canvas-map", 
//     "{{ asset('images/robot/map.svg') }}",
//     "{{ asset('images/robot/robot.png') }}",
//     120,
//     10,
//     80,
//     80);

// testing

// window.onload = function() {
//     var directions = [
//             {side: "Forward", meters: 1},
//             {side: "Right", meters: 4},
//             {side: "Forward", meters: 1},
//         ];

//     moveToDestination(directions).then(() => console.log('done'))
// }

</script>