<template>
    <div class="position-relative">
        <input type="text" v-model="input" class="form-control" 
                           v-bind:placeholder="placeholder"
                           v-on:focus="focused=true"
                           v-on:blur="focused=false"
                           v-on:keydown.down="nextPos"
                           v-on:keydown.up="prevPos"
                           v-on:keydown.enter.prevent="complete(listPos)">
        <div v-if=focused class="list-group position-absolute">
            <button v-for="(row,index) in shownItems" class="list-group-item list-group-item-action"
                    v-bind:key="index"
                    v-on:mousedown="complete(index)"
                    v-bind:class="{'active':listPos===index}">{{row[field]}}</button>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        value:Object,
        data:Array,
        field:String,
        placeholder:String
    },
    data() {
        return {
            input:'',
            shownItems:[],
            listPos:-1,
            focused:false
        }
    },
    watch: {
        input(newVal) {
            this.shownItems=this.data.filter(row=> {
                if(!this.input)
                    return false;
                return row[this.field].toLowerCase().startsWith(this.input.toLowerCase());
            }).filter((row,index)=> {
                if(index>=10)
                    return false;
                return true;
            });
            this.listPos=-1;
            if(!this.shownItems.some((item,index)=> {
                if(item[this.field].toLowerCase()===newVal.toLowerCase())
                {
                    if(this.weak)
                        this.$emit('input',this.shownItems[index])
                    else
                        this.$emit('input',this.shownItems[index]);
                    return true;
                }
            }))
            {
                let object={};
                object['id']=null;
                object[this.field]=newVal;
                this.$emit('input',object);
            }
        },
        value(newVal) {
            this.input=newVal[this.field];
        }
    },
    methods: {
        complete(index) {
            if(index>=0)
            {
                this.input=this.shownItems[index][this.field];
                this.focused=false;
            }
        },
        nextPos() {
            if(this.listPos<this.shownItems.length-1)
                this.listPos++;
        },
        prevPos() {
            if(this.listPos>0)
                this.listPos--;
        }
    }
}
</script>