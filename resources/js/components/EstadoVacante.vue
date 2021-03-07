<template>
    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800"
         @click="cambiarEstado"
         :key="estadoVacanteData"
         :class="claseEstadoVacante()"
    >
                    Activa
    </span>
</template>
<script>
export default {
    props : ['estado', 'vacanteId'],
    mounted() 
    {
        this.estadoVacanteData = Number(this.estado)
    },
    data : function()
    {
        return {
            estadoVacanteData : null
        }
    },
    methods: {
       
        claseEstadoVacante()
        {
            return this.estadoVacanteData === 1 ? "bg-green-100 text-green-800" : "bg-red-100 text-green-800" 
        },
       cambiarEstado()
        {

        } 
    },
}
</script>