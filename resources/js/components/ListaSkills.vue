<template>
<div>    <ul class="flex flex-wrap justify-center">
        <li class="border border-gray-500 px-3 mb-3 rounded mr-4"
            v-for="(skill, i) in this.skills"
            v-bind:key="i"
            v-on:click="activar"
        >{{skill}}</li>
    </ul>
    <input type="hidden" name="skills" id="skills">
</div>
</template>

<script>
export default 
{
    props: ['skills'],
    mounted()
    {
        console.log(this.skills)
    },
    data : function()
    {
        return {
            habilidades : new Set()
        }
    },
    methods: {
        activar(e)
        {   
            if(e.target.classList.contains('bg-blue-400'))
            {
               e.target.classList.remove('bg-blue-400')
               this.habilidades.delete(e.target.textContent)
            } else
            {
                e.target.classList.add('bg-blue-400')
                /* agregar al set de habiliudades */

                this.habilidades.add(e.target.textContent)
            }

            //agregar valores al input 
            const stringHablididades = [...this.habilidades]
            document.querySelector('#skills').value = stringHablididades
        }
    },    
}
</script>