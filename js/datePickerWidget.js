/* Date Picker Widget for Zellig Care theme */
var datePickerWidget = {
    init: function(format) {
        this.format = format || "mm/dd/yyyy";
        this.bindEvents();
    },
    
    bindEvents: function() {
        // Find all date input fields
        var dateInputs = $('input[type="date"], input[data-datepicker]');
        
        dateInputs.each(function() {
            var $input = $(this);
            
            // Add date picker functionality
            $input.attr('placeholder', $input.attr('placeholder') || 'MM/DD/YYYY');
            
            // Add date picker icon if not present
            if (!$input.siblings('.date-picker-icon').length) {
                $input.wrap('<div class="date-picker-wrapper"></div>');
                $input.after('<span class="date-picker-icon">📅</span>');
            }
        });
        
        // Handle date picker icon clicks
        $('.date-picker-icon').on('click', function() {
            var $input = $(this).siblings('input');
            $input.focus();
        });
    },
    
    formatDate: function(date) {
        var d = new Date(date);
        var month = ("0" + (d.getMonth() + 1)).slice(-2);
        var day = ("0" + d.getDate()).slice(-2);
        var year = d.getFullYear();
        
        return month + "/" + day + "/" + year;
    },
    
    parseDate: function(dateString) {
        if (!dateString) return null;
        
        var parts = dateString.split('/');
        if (parts.length !== 3) return null;
        
        var month = parseInt(parts[0], 10);
        var day = parseInt(parts[1], 10);
        var year = parseInt(parts[2], 10);
        
        if (isNaN(month) || isNaN(day) || isNaN(year)) return null;
        
        return new Date(year, month - 1, day);
    }
};
