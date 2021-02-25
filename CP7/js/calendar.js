//Exécute 
document.addEventListener('DOMContentLoaded', function () {
    loadDetails().then(res => {
        let ecal = document.getElementById('calendar');
        let oCal = new FullCalendar.Calendar(ecal, {
            plugins: ['dayGrid'],
            locale: 'fr',
            eventColor: '#ff0000',
            events: res
        });
        oCal.render();
    }
    ).catch(err => console.log(err));
});

async function loadDetails() {
    const response = await fetch('calendar_data.php');
    const resData = await response.json();
    return resData;
}