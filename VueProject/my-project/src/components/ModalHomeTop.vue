<script>
import ModalEdit from './ModalHomeEdit.vue';
import ModalAdd from './ModalHomeAdd.vue';
export default {
  name: 'Modal',
  data() {
    return {
      isModalEditVisible: false,
      isModalAddVisible: false,
    };
  },
  methods: {
    close() {
      this.$emit('close');
    },
    showModal() {
      this.isModalEditVisible = true;
    },
    closeModal() {
      this.isModalEditVisible = false;
    },
    showModalAdd() {
      this.isModalAddVisible = true;
    },
    closeModalAdd() {
      this.isModalAddVisible = false;
    },
  },
  components: {
    ModalEdit,
    ModalAdd,
  }
};
</script>

<template>
  <div class="modal-backdrop"  @click.self="close">
    <div class="modal">
      <div class="headNew">
        <button
          type="button"
          class="btn-close block"
          @click="close"
        >
          x
        </button>
      </div>
      <div class="modal-header">
        <!-- <slot name="header">
          This is the default title!
        </slot> -->
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full w-full block text-left">
          Nhà 1
        </button>
      </div>

      <section class="modal-body flex content-between">
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full w-full block text-left justify-between flex m-1" @click="showModal">
          <div>
          Cài đặt nhà
          </div>
          <svg class="h-6 w-6 text-pink-500"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <path d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />  <circle cx="12" cy="12" r="3" /></svg>
        </button>

        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full w-full block text-left justify-between flex m-1" @click="showModalAdd">
          <div>Thêm nhà mới</div>
          <svg class="h-6 w-6 text-pink-500"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <circle cx="12" cy="12" r="9" />  <line x1="9" y1="12" x2="15" y2="12" />  <line x1="12" y1="9" x2="12" y2="15" /></svg>
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
  
    <ModalEdit
      v-show="isModalEditVisible"
      @close="closeModal"
    />
    <ModalAdd
      v-show="isModalAddVisible"
      @close="closeModalAdd"
    />


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
  margin: 60px 40px;
  width: auto;
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