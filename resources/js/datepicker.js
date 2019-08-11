let clinicApp = {
    $calendar: {},
    $doctorCard: {},

    init: function () {
        this.datepicker();
    },

    datepicker: function () {
        var self = this;
        $(".datepicker").datepicker({
            minDate: 0, maxDate: "+1M",
            dateFormat: 'yy-mm-dd',
            onSelect: function (date) {
                self.$calendar = $(this);
                self.$doctorCard = $(this).parent().prev();
                self.getSlots(date);
            }
        });

    },

    getSlots: function (date) {
        var self = this;
        axios.post('/ajax-slots', {
            date: date,
            doctorId: self.$calendar.data('doctorId')
        })
            .then(function (response) {
                // handle success
                self.drawSlots(response);
            })
            .catch(function (error) {
                // handle error
                console.log(error);
            });
    },

    drawSlots: function (response) {
        var slots = [];
        $.each(response.data.freeSlots, function(slot, time) {
            slots += `<a data-slot="${slot}" data-toggle="modal" data-target="#visitModal" 
            href="#" class="badge badge-info mx-2">${time[0]} - ${time[1]}</a> `;
        });
        this.$doctorCard.html(slots);
    }
};

$(function () {
    clinicApp.init();
});
