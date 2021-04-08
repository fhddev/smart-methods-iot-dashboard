
<script>

const artyom = new Artyom();

var speakerName = null;

var myGroup = [
    {
        description:"If my database contains the name of a person say something",
        smart:true, // a Smart command allow you to use wildcard in order to retrieve words that the user should say
        // Ways to trigger the command with the voice
        indexes:["Do you know who is *","I don't know who is *","Is * a good person"],
        // Do something when the commands is triggered
        action:function(i,wildcard){
            var database = ["Carlos","Bruce","David","Joseph","Kenny"];

            //If the command "is xxx a good person" is triggered do, else
            if(i == 2){
                if(database.indexOf(wildcard.trim())){
                    artyom.say("I'm a machine, I dont know what is a feeling");
                }else{
                    artyom.say("I don't know who is " + wildcard + " and i cannot say if is a good person");
                }
            }else{
                if(database.indexOf(wildcard.trim())){
                    artyom.say("Of course i know who is "+ wildcard + ". A really good person");
                }else{
                    artyom.say("My database is not big enough, I don't know who is " + wildcard);
                }
            }
        }
    },
    {
        description:"--",
        smart:false, // a Smart command allow you to use wildcard in order to retrieve words that the user should say
        // Ways to trigger the command with the voice
        indexes:["hi","hello","is there anyone here"],
        // Do something when the commands is triggered
        action:function(){
            artyom.say("Hey! How are you today?");
        }
    },
    {
        description:"--",
        smart:false, // a Smart command allow you to use wildcard in order to retrieve words that the user should say
        // Ways to trigger the command with the voice
        indexes:["how are you","what about you", "what's about you"],
        // Do something when the commands is triggered
        action:function(){
            var database = ["I’m well, thank you", "I’m good, thanks", "I’m fine, thanks"];

            artyom.say(database[Math.floor(Math.random() * database.length)]);
        }
    },
    {
        description:"--",
        smart:false, // a Smart command allow you to use wildcard in order to retrieve words that the user should say
        // Ways to trigger the command with the voice
        indexes:["what is your name", "what's your name"],
        // Do something when the commands is triggered
        action:function(){
            artyom.say("my name is Alex");
        }
    },
    {
        description:"--",
        smart:false, // a Smart command allow you to use wildcard in order to retrieve words that the user should say
        // Ways to trigger the command with the voice
        indexes:["i need you to do something for me"],
        // Do something when the commands is triggered
        //, "I’m fine. Lately, just classes and work."
        action:function(){
            artyom.say("sure, how can i help you");
        }
    },
    {
        description:"--",
        smart:true, // a Smart command allow you to use wildcard in order to retrieve words that the user should say
        // Ways to trigger the command with the voice
        indexes:["alex *"],
        // Do something when the commands is triggered
        //, "I’m fine. Lately, just classes and work."
        action:function(i, wildcard){
            var database = ["what date is it today", "what date is't today"];

            if (i == 0)
            {
                var index = database.indexOf(wildcard.trim());
                if (index == 0)
                {
                    var weekdays = new Array(
                        "Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"
                    );

                    var day = (new Date()).getDay();

                    artyom.say("Today is " + weekdays[day]);
                }
                else
                {
                    artyom.say("sorry, can you say that again");
                }
            }
        }
    },
    {
        description:"--",
        smart:true, // a Smart command allow you to use wildcard in order to retrieve words that the user should say
        // Ways to trigger the command with the voice
        indexes:["go to *"],
        // Do something when the commands is triggered
        //, "I’m fine. Lately, just classes and work."
        action:function(i, wildcard){
            // var database = ["what date is it today", "what date is't today"];

            if (i == 0)
            {
                // artyom.say(wildcard.trim());
                // console.log("Wildcard is " + wildcard.trim());
                var reqData = {
                    dest_name: wildcard.trim()
                };

                //
                $.ajax({
                    type:'POST',
                    url: "{{ route('maps.details') }}",
                    headers: {
                        'X-CSRF-Token': '{{ csrf_token() }}',
                    },
                    data: JSON.stringify(reqData),
                    // dataType: 'json',
                    success: function (result) {
                        // debugger;
                        let jsonData = JSON.parse(result);
                        // console.log(jsonData);
                        // 'dest_name' 
                        // 'voice_command' 
                        // 'directions'
                        artyom.say("I am on my way to "+jsonData.voice_command);
                        // moveRobotTo(jsonData.directions);
                        // console.log(jsonData.directions)
                        moveToDestination(jsonData.directions).then(() => console.log(jsonData.directions))
                    },
                    error: function (response, status, error) {
                        // if (response.status === 422) {
                        console.log('Error : ' + response.responseText );
                        artyom.say("Sorry, can you say the location name again");
                    },
                });
            }
        }
    },
];

artyom.addCommands(myGroup); 

// This function activates artyom and will listen all that you say forever (requires https conection, otherwise a dialog will request if you allow the use of the microphone)
function startContinuousArtyom(){
    artyom.fatality();// use this to stop any of

    setTimeout(function(){// if you use artyom.fatality , wait 250 ms to initialize again.
         artyom.initialize({
            lang:"en-US",// A lot of languages are supported. Read the docs !
            continuous:true,// Artyom will listen forever
            listen:true, // Start recognizing
            debug:true, // Show everything in the console
            speed:1 // talk normally
        }).then(function(){
            console.log("Ready to work !");
        });
    },250);
}



function initSimulator(){
    // init board
    init(
        "canvas-map", 
        "{{ asset('images/robot/map.svg') }}",
        "{{ asset('images/robot/robot.png') }}",
        105,
        5,
        90,
        90);
    
    startContinuousArtyom();

    artyom.say('Welcome to the robot emulator');
}












</script>

@include('scripts/simulator')