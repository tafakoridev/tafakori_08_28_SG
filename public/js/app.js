function redirect(url) {
    window.location.href = url;
}

let selected = [];
function select(id) {
    const index = selected.indexOf(id);
    if (index !== -1) {
        selected.splice(index, 1);
        document.getElementById(`item-${id}`).classList.remove("selected-item");
    } else {
        selected.push(id);
        document.getElementById(`item-${id}`).classList.add("selected-item");
    }
    if (selected.length > 0) {
        document.getElementById('selected').innerHTML = `${selected.length} مورد انتخاب شده`
        document.getElementById('selected').classList.add('show');
        document.getElementById('selected').classList.remove('hide');
    }
    else {
        document.getElementById('selected').classList.remove('show');
        document.getElementById('selected').classList.add('hide');
    }

}

async function addToCart(id) {
    try {
        const response = await fetch(`/api/cart/add/${id}`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
        });
        const result = await response.json();
    } catch (error) {
        console.error(error);
    }
    location.reload();
}


async function removeFromCart(id) {
    try {
        const response = await fetch(`/api/cart/remove/${id}`, {
            method: 'DELETE',
            headers: {
                'Content-Type': 'application/json',
            },
        });
        const result = await response.json();
    } catch (error) {
        console.error(error);
    }
    location.reload();
}