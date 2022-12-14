var usuarios = [];
function obtenerUsuarios(){
    axios({
        method:'GET',
        url:'http://localhost/taller-final-DW-develop/actas-api/',
        responseType:'json'
    }).then(res=>{
        console.log(res.data);
        this.usuarios = res.data;
        llenarTabla();
    }).catch(error=>{
        console.error(error);
    });
}

obtenerUsuarios();

function llenarTabla(){
    for (let i = 0; i < usuarios.length; i++) {
       document.querySelector('#tabla-usuarios tbody').innerHTML += 
       `<tr>
            <td>
                <span class="custom-checkbox">
                    <input type="checkbox" id="checkbox1" name="options[]" value="1">
                    <label for="checkbox1"></label>
                </span>
            </td>
            <td>${usuarios[i].id}</td>
            <td>${usuarios[i].username}</td>
            <td>${usuarios[i].password}</td>
            <td>${usuarios[i].nombres}</td>
            <td>${usuarios[i].apellidos}</td>
            <td>${usuarios[i].tipo_id}</td>
            <td>
                <a href="#editEmployeeModal" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                <a href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
            </td>
        </tr>`; 
    }
}