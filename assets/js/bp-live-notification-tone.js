jQuery(document).ready(function(){
    
    ion.sound({
            sounds: [{
                        name: "bell_ring",
                    }],
            path: plugin_url_live_notification_tone.url + "assets/sounds/",
            preload: true
    });
    //on New notification, tring:)
    jQuery(document).bind( 'bpln:new_notifications', function(){
      
        //alert('message is receievd');
        ion.sound.play('bell_ring');
        
    });
    
});