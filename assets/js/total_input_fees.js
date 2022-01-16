
        const fees = document.getElementById('1st_depo');
        const fees2 = document.getElementById('2nd_depo');
        const fees3 = document.getElementById('3rd_depo');
        
       
        if (fees.value != 0) {
            fees.setAttribute("readonly", true);
        }
        if (fees2.value != 0) {
            fees2.setAttribute("readonly", true);
        }
        if (fees3.value != 0) {
            fees3.setAttribute("readonly", true);
        }
    

 // formatting input data to currency format       

  