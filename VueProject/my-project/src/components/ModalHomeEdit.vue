<script>
  export default {
    name: 'ModalEdit',
    methods: {
      close() {
        this.$emit('close');
      },
    },
  };
</script>

<template>
  <div class="modal-backdrop">
    <div class="modal">
      <header class="flex justify-between m-1">
        <div>
          <svg class="h-8 w-8 text-red-500 inline"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <polyline points="15 6 9 12 15 18" /></svg>
          Nhà
        </div>
        <span>Xong</span>
      </header>
      <section class="flex justify-between flex-col">
        <div class=" m-1">
        Tên nhà:
        </div>
        <div class=" m-1">
          <input type="text" value="Nhà 1" class="w-full">
        </div>
        
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full w-full block text-left justify-between flex m-1">
          <div>Xóa nhà</div>
          <svg class="h-6 w-6 text-red-500"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <line x1="4" y1="7" x2="20" y2="7" />  <line x1="10" y1="11" x2="10" y2="17" />  <line x1="14" y1="11" x2="14" y2="17" />  <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />  <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg>
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
  margin: 60px 0;
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

.btnVIP {
  /* width: 100px; */
}
</style>