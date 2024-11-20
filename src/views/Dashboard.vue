<template>
  <div class="container-lg">
    <Breadcrumbs />
    <h1>Hallo {{ userName }}!</h1>
    <div class="row">
      <div class="col-md-2">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Mein Account</h5>
            <div class="d-flex flex-column">
              <router-link to="#" class="product-btn" @click="showOverviewAndNavigate">Übersicht</router-link>
              <router-link v-if="userisAdmin" to="#" class="product-btn" @click="showProductsAndNavigate">Produkte</router-link>
              <router-link v-if="userisAdmin" to="#" class="product-btn" @click="showCustomersAndNavigate">Kunden</router-link>
              <router-link v-if="!userisAdmin" to="#" class="product-btn" @click="showAddressesAndNavigate">Adressen</router-link>
              <router-link to="#" class="product-btn" @click="showOrdersAndNavigate">Bestellungen</router-link>
              <button type="button" class="logout-btn" @click="logout">Logout</button>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-10">
        <div class="card">
          <div class="card-body">
            <div v-if="userisAdmin">
              <div class="row-Admin">
                <div v-if="showOverview"><Overview /></div>
                <div v-if="showProducts"><product_editor /></div>
                <div v-if="showOrders"><Orders /></div>
                <div v-if="showCustomers"><Customers /></div>
              </div>
            </div>
            <div v-else>
              <div v-if="showOverview">
                <h6>User-Bereich</h6>
                <p>Willkommen im Dashboard! Hier kannst du deine Daten einsehen.</p>
              </div>
              <div v-if="showOrders"><Orders /></div>
              <div v-if="showAddresses"><p>Hier können deine gespeicherten Adressen verwaltet werden.</p></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Breadcrumbs from '@/components/breadcrumbs.vue';
import Overview from '@/components/overview.vue';
import Orders from '@/components/orders.vue';
import product_editor from '@/components/product_editor.vue';
import Customers from '@/components/customers.vue';

export default {
  name: 'Dashboard',
  components: {
    Breadcrumbs,
    product_editor,
    Overview,
    Orders,
    Customers
  },
  data() {
    return {
      userName: '',
      userisAdmin: '',
      showOverview: true,
      showProducts: false,
      showOrders: false,
      showCustomers: false,
      showAddresses: false,
    };
  },
  async mounted() {
    try {
      const response = await fetch('http://localhost/code_online_shop/backend/user_info.php', {
        method: 'GET',
        credentials: 'include',
      });
      const result = await response.json();

      if (result.success) {
        this.userisAdmin = result.isAdmin;
        this.userName = result.firstname;
      } else {
        console.error("Fehler beim Abrufen der Daten:", result.message);
      }
    } catch (error) {
      console.error("Fehler beim Abrufen der Daten:", error);
    }
  },
  methods: {
    async logout() {
      try {
        const response = await fetch('http://localhost/code_online_shop/backend/logout.php', {
          method: 'GET',
          credentials: 'include',
        });

        const result = await response.json();

        if (result.message === "Logout erfolgreich!") {
          this.$router.push({ name: 'Home' });
        } else {
          console.error("Logout fehlgeschlagen:", result.message);
        }
      } catch (error) {
        console.error("Fehler beim Logout:", error);
      }
    },
    showOverviewAndNavigate() {
      this.resetTabs();
      this.showOverview = true;
    },
    showProductsAndNavigate() {
      this.resetTabs();
      this.showProducts = true;
    },
    showOrdersAndNavigate() {
      this.resetTabs();
      this.showOrders = true;
    },
    showCustomersAndNavigate() {
      this.resetTabs();
      this.showCustomers = true;
    },
    showAddressesAndNavigate() {
      this.resetTabs();
      this.showAddresses = true;
    },
    resetTabs() {
      this.showOverview = false;
      this.showProducts = false;
      this.showOrders = false;
      this.showCustomers = false;
      this.showAddresses = false;
    }
  },
};
</script>

<style scoped>
.row {
  margin-top: 3vh;
  margin-bottom: 5vh;
}
.breadcrumbs {
  margin-top: 3vh;
}
.logout-btn {
  background-color: #f09118;
  color: white;
  padding: 0.5rem 1rem;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  margin-top: 1rem;
  max-width: fit-content;
}
.logout-btn:hover {
  background-color: #d57d0b;
}
.product-btn {
  color: rgb(21, 21, 21);
  border: none;
  cursor: pointer;
  margin-top: 1rem;
  text-decoration: none;
  border-bottom: #d1d1d1 1px solid;
  padding: 0.1rem 0;
  min-width: 80%;
  padding-bottom: 0.7rem;
}
.product-btn:hover {
  text-decoration: underline;
}

</style>
