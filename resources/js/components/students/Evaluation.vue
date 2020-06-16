<template>
  <div id="app">
    <router-view />
    <Navigation :student="student" />
    <v-content>
        <h3 class="mt-5" style="color:#212121; font-family: 'Roboto', sans-serif; text-align: center; font-weight:100;">Evaluation</h3>
             <v-container>

                    <!-- EVALUATION FORM TABLE -->
                        <v-card class="mt-3 mx-auto" width="900">
                            <v-card-title>
                                Evaluation Form
                            </v-card-title>
                                <v-simple-table style="background-color: #F5F5F5;" fixed-header>
                                <template v-slot:default>
                                            <thead>
                                                    <tr>
                                                        <th class="text-left">Title</th>
                                                        <th class="text-left">Type</th>
                                                        <th class="text-left">Start Evaluate</th>
                                                    </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                            </tbody>
                                </template>
                                </v-simple-table>
                        </v-card>

             </v-container>
    </v-content>
    <Footer />
  </div>
</template>

<script>
import Navigation from "./components/Navigation";
import Footer from "./components/Footer";
export default {

  props: {
    student: {
      type: Object,
      required: true
    }
  },

  name: "Student_Evaluation",

  components: {
    Navigation: Navigation,
    Footer: Footer
  },

  data: () => ({
      evaluations: [],
      evaluators: [],
      teachers: [],
      faculties: [],
      questions: [],
      ratings: [],
      comments: []
  }),

  created() {
        this.fetchEvaluation();
  },

  methods: {
    fetchEvaluation() {
      axios.get("/student/evaluation/view").then(response => {
        this.evaluations = response.data.evaluations;
        this.evaluators = response.data.evaluators;
        this.teachers = response.data.teachers;
        this.faculties = response.data.faculties;
        this.questions = response.data.questions;
        this.ratings = response.data.ratings;
        this.comments = response.data.comments;
      });
    },
  }

};
</script>
