$(document).ready(function() {
    $(document).on("blockEditing", function(event, element){
        if (element.attr('data-type') != 'BootstrapNavbarBlock') {
            return;
        }
        
        $(element)
            .find('.al-navbar-list')
            .inlinelist('start')
        ;
    });
    
    $(document).on("blockStopEditing", function(event, element){ 
        if (element.attr('data-type') != 'BootstrapNavbarBlock') {
            return;
        }
                
        $(element)
            .find('.al-navbar-list')
            .inlinelist('stop')
        ;
        $('.al_block_adder').unbind().blocksMenu('initAdders')
    });
});