<script>

  // import ColorPicker from './ColorPicker.vue';


  export default {
    name: 'ModalAdd',
    methods: {
      close() {
        this.$emit('close');
      },
    },
  components: {
    // ColorPicker,
  },
  };
</script>

<template>
  <div class="modal-backdrop" @click.self="close">
    <div class="modal" >
      <header class="flex justify-between m-1">
        <div>
          <svg class="h-8 w-8 text-red-500 inline"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <polyline points="15 6 9 12 15 18" /></svg>
          Nhà
        </div>
        <span>Xong</span>
      </header>
      <section class="flex justify-between flex-col">     

        
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full block text-left flex m-1">
          <svg class="h-6 w-6 text-red-500 mr-1"  fill="none" viewBox="0 0 24 24" stroke="currentColor"
          @click="showModalAddRoom"
          >
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"/>
          </svg>
          <div>Thêm phòng</div>
        </button>
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full block text-left flex m-1">
          <svg class="h-6 w-6 text-red-500 mr-1"  fill="none" viewBox="0 0 24 24" stroke="currentColor"
          @click="showModalAddRoom"
          >
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"/>
          </svg>
          <div>Thêm thao tác</div>
        </button>
      </section>
      <footer class="modal-footer">
        <!-- <slot name="footer">
          This is the default footer!
        </slot> -->
        <button
          type="button"
          class="btn-green"
          @click="close"
        >
          Close Modal
        </button>
      </footer>
    </div>
  </div>
</template>


<style scoped>
.modal-backdrop {
  position: fixed;
  top: 0px;
  bottom: 0;
  left: 0px;
  right: 0;
  background-color: rgba(0, 0, 0, 0.3);
  /* display: flex; */
  justify-content: center;
  align-items: center;
}

.modal {
  position: relative;
  background: #FFFFFF;
  box-shadow: 2px 2px 20px 1px;
  overflow-x: auto;
  display: flex;
  flex-direction: column;
  /* top: 80px;
  left: 50px; */
  margin: 60px 50px;
  width: auto;
  justify-content: space-around;
}

.headNew  {
  padding: 2px;
  display: flex;
  position: relative;
  /* border-bottom: 1px solid #eeeeee; */
  color: #4AAE9B;
  justify-content: space-between;  
}

.modal-header,
.modal-footer  {
  padding: 4px;
  display: flex;
}

.modal-header {
  position: relative;
  border-bottom: 1px solid #eeeeee;
  color: #4AAE9B;
  justify-content: space-between;
}

.modal-footer {
  border-top: 1px solid #eeeeee;
  flex-direction: column;
  justify-content: flex-end;
}

.modal-body {
  position: relative;
  /* padding: 20px 10px; */
  /* padding: 5px; */
  align-content:space-around;
  display: flex;
  flex-wrap: wrap;
}

.btn-close {
  position: absolute;
  top: 0;
  right: 0;
  border: none;
  font-size: 20px;
  padding: 0 10px;
  cursor: pointer;
  font-weight: bold;
  color: #4AAE9B;
  display: flex;
  /* background: transparent; */
}

.btn-green {
  color: rgb(142, 48, 48);
  background: #4AAE9B;
  border: 1px solid #4AAE9B;
  border-radius: 2px;
}

</style>