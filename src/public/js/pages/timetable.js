$('body').on('click', '#timetable_modal_show', function () {
    var calendarEl = $("#procedure_timetable #calendar");
    var procedure = $(this).attr("data-procedure_id");
    var date_start = calendar.view.activeStart.toLocaleDateString("ru");
    var date_end = calendar.view.activeEnd.toLocaleDateString("ru");

    if (procedure !== calendarEl.attr("data-procedure")) {
        clear_calendar();
    } else {
        return;
    }

    calendarEl.attr("data-procedure", procedure);
    refresh_calendar(procedure, date_start, date_end);
});

