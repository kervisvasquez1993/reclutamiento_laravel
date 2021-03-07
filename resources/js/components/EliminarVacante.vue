<template>
    <button  class="text-red-600 hover:text-red-900  mr-5"
    @click="eliminarVacante"
    >Eliminar</button>
</template>
<script>
export default {
    props : ['vacanteId'],
    methods: {
        eliminarVacante()
        {
            this.$swal.fire({
                      title: '¿Deseas Eliminar esta vacante?',
                      text: "Una vez eliminada no se puede eliminar",
                      icon: 'warning',
                      showCancelButton: true,
                      confirmButtonColor: '#3085d6',
                      cancelButtonColor: '#d33',
                      confirmButtonText: 'Si',
                      cancelmButtonText : 'No',
                    }).then((result) => {
                        const param = {
                            id : this.vacanteId,
                            _method : 'delete'
                        }
                        axios.post(`/vacantes/${this.vacanteId}`, param)
                        .then(respuesta => 
                             this.$swal.fire(
                                       'Eliminado!',
                                       respuesta.data.mensaje,
                                       'success'
                                      )
                        )
                        .catch( error => {
                            console.log(error)
                        })
                      if (result.isConfirmed) {
                     
                      }
                    })
        }
    },
}
</script>