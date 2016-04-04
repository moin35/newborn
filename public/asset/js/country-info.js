var stateObject = {
    "Barisal": {
        "Barguna": ["Amtali", "Bamna", "Barguna Sadar", "Betagi", "Patharghata", "Taltoli"],
        "Barisal": ["Agailjhara", "Babuganj","Bakerganj", "Banaripara","Gaurnadi", "Hizla","Barisal", "Mehendiganj","Muladi", "Wazirpur"],
        "Bhola": ["Test 1", "Test 2","Test 3", "Test 4","Test 5", "Test 6"],
        "Jhalokati": ["Test 1", "Test 2","Test 3", "Test 4","Test 5", "Test 6"],
        "Patuakhali": ["Test 1", "Test 2","Test 3", "Test 4","Test 5", "Test 6"],
        "Pirojpur": ["Test 1", "Test 2","Test 3", "Test 4","Test 5", "Test 6"]
 
    },
    "Chittagong": {
        "D1": ["d11", "d12"],
        "D2": ["d21", "d22"]
    },
        "Dhaka": {
        "Dhaka City": ["Adabor", "Badda","Bangsal", "Bimanbandar","Cantonment", "Chak Bazar","Dakshinkhan", "Darus Salam","Adabor", "Demra"],
        "Faridpur": ["Test 1", "Test 2","Test 3", "Test 4","Test 5", "Test 6"],
        "Gazipur": ["Test 1", "Test 2","Test 3", "Test 4","Test 5", "Test 6"],
        "Gopalganj": ["Test 1", "Test 2","Test 3", "Test 4","Test 5", "Test 6"],
        "Jamalpur": ["Test 1", "Test 2","Test 3", "Test 4","Test 5", "Test 6"],
        "Kishoreganj": ["Test 1", "Test 2","Test 3", "Test 4","Test 5", "Test 6"],
        "Dhaka": ["Test 1", "Test 2","Test 3", "Test 4","Test 5", "Test 6"],
        "Faridpur": ["Test 1", "Test 2","Test 3", "Test 4","Test 5", "Test 6"],
        "Madaripur": ["Test 1", "Test 2","Test 3", "Test 4","Test 5", "Test 6"],
        "Manikganj": ["Test 1", "Test 2","Test 3", "Test 4","Test 5", "Test 6"],
        "Munshiganj ": ["Test 1", "Test 2","Test 3", "Test 4","Test 5", "Test 6"],
        "Mymenshing": ["Test 1", "Test 2","Test 3", "Test 4","Test 5", "Test 6"]
    },
        "Khulna": {
        "D1": ["d11", "d12"],
        "D2": ["d21", "d22"]
    },
        "Mymensingh": {
        "D1": ["d11", "d12"],
        "D2": ["d21", "d22"]
    },
            "Rajshahi": {
        "D1": ["d11", "d12"],
        "D2": ["d21", "d22"]
    },
            "Rangpur": {
        "D1": ["d11", "d12"],
        "D2": ["d21", "d22"]
    },
            "Sylhet": {
        "D1": ["d11", "d12"],
        "D2": ["d21", "d22"]
    },
}
window.onload = function () {
    var countySel = document.getElementById("countySel"),
        stateSel = document.getElementById("stateSel"),
        districtSel = document.getElementById("districtSel");
    for (var country in stateObject) {
        countySel.options[countySel.options.length] = new Option(country, country);
    }
    countySel.onchange = function () {
        stateSel.length = 1; // remove all options bar first
        districtSel.length = 1; // remove all options bar first
        if (this.selectedIndex < 1) return; // done   
        for (var state in stateObject[this.value]) {
            stateSel.options[stateSel.options.length] = new Option(state, state);
        }
    }
    countySel.onchange(); // reset in case page is reloaded
    stateSel.onchange = function () {
        districtSel.length = 1; // remove all options bar first
        if (this.selectedIndex < 1) return; // done   
        var district = stateObject[countySel.value][this.value];
        for (var i = 0; i < district.length; i++) {
            districtSel.options[districtSel.options.length] = new Option(district[i], district[i]);
        }
    }
};