<script>
    // document.onload = function(){
    //   var canvas = document.getElementById("canvas"),
    //     ctx = canvas.getContext("2d");

    //     canvas.width = 934;
    //     canvas.height = 622;


    //     var background = new Image();
    //     background.src = "http://i.imgur.com/yf6d9SX.jpg";

    //     background.onload = function(){
    //         ctx.drawImage(background,0,0);   
    //     }
    // };


    var movements = [];

    var canvas = document.getElementById('canvas-map');
    var ctx = canvas.getContext('2d');

    var robotX = 120;
    var robotY = 10;

    var lastMetersNumber = 0;
    var lastMovingSide = '';

    var map = new Image();
    map.src = "{{ asset('images/robot/map.svg') }}";

    var robot;

    map.onload = function (){
    ctx.drawImage(map,0,0);  
    
    robot = new Image();
    robot.src = "{{ asset('images/robot/robot.png') }}";
    
    robot.onload = function(){
        ctx.drawImage(robot,robotX,robotY, 80, 80);
    }
    }
    
    // script
    var table = document.getElementById('directions_table');
    var tbody = table.getElementsByTagName('tbody')[0];
    var meters = document.getElementById('meters');

    // variables
    var rowsCount = 0;

    // table functions
    function clearTable() {
    for(var i = table.rows.length - 1; i > 0; i--){
        table.deleteRow(i);
    }
    }
    function addRow(side, meters){
    var row = table.insertRow(rowsCount);
    var cellDir = row.insertCell(0);
    var cellMeters = row.insertCell(1);
    var cellActions = row.insertCell(2);

    cellDir.innerHTML = side;
    cellMeters.innerHTML = meters;
    cellActions.innerHTML = '<button onclick="removeRow(this); return false" class="btn btn-danger btn-sm" type="submit">Delete</button>';
    }
    function removeRow(e){
    //          <td>        <tr>
    var row = e.parentNode.parentNode; 
    //  tbody
    row.parentNode.removeChild(row);

    rowsCount--;

    // reverse side
    if (lastMovingSide == 'Right') {
        moveRobot('Left', lastMetersNumber);
    }
    else if (lastMovingSide == 'Left') {
        moveRobot('Right', lastMetersNumber);
    }
    else if (lastMovingSide == 'Forward') {
        moveRobot('Backward', lastMetersNumber);
    }
    else if (lastMovingSide == 'Backward') {
        moveRobot('Forward', lastMetersNumber);
    }
    else {
        console.log('Unkown side');
        return;
    }

    lastMovingSide = '';
    lastMetersNumber = 0;

    movements.pop();
    }

    // direction buttons
    function addDirection(sideString)
    {
    rowsCount++;
    addRow(sideString, meters.value);

    // move the robot
    moveRobot(sideString, meters.value);

    // add to dataset
    movements.push({
        side: sideString,
        meters: meters.value
    });
    }

    function datasetToJson(){
    var jsonString = JSON.stringify(movements);
    console.log(jsonString);
    }

    function resetEverything() {
    // code..
    }

    function bookmark() {
    //code...
    }

    function moveRobot(side, meters){
    
        lastMetersNumber = meters;
        lastMovingSide = side;

        switch (side) {
            case 'Right':
            robotX = (robotX + (100 * meters));
            break;
            case 'Left':
            robotX = (robotX - (100 * meters));
            break;
            case 'Forward':
            robotY = (robotY + (100 * meters));
            break;
            case 'Backward':
            robotY = (robotY - (100 * meters));
            break;
            default:
            console.log('Unkown side');
            return;
        }

        ctx.clearRect(0,0, canvas.width, canvas.height);
        ctx.drawImage(map,0,0);
        ctx.drawImage(robot,robotX,robotY, 80, 80);
    }

    function save(e) {
        var dest_name = document.getElementById('dest_name');
        var voice_command = document.getElementById('voice_command');
        // var directions = movements;
        
        var reqData = {
            destination: dest_name.value,
            voice_command_string: voice_command.value,
            directions: movements
        };

        //
        $.ajax({
            type:'POST',
            url: "{{ route('maps.store') }}",
            headers: {
                'X-CSRF-Token': '{{ csrf_token() }}',
            },
            data: JSON.stringify(reqData),
            success: function (result) {
                // debugger;
                // let jsonData = JSON.parse(result);
                // console.log(result);
                window.location.replace("{{ route('maps.index') }}");
            },
            error: function (response, status, error) {
                // if (response.status === 422) {
                console.log('Error : ' + response.status);
            },
        });

    }
    
</script>