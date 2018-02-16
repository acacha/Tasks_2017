<template>
    <div>
        <div class="timeline">
            <div class="timeline-event">
                <div class="timeline-content">
                    <v-card>
                        <v-card-title primary-title>
                            <div>
                                <h3 class="headline mb-0">Event 1 title</h3>
                                <div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci aperiam blanditiis, cumque delectus deleniti earum facere, fugit hic ipsam iste iusto laboriosam nam perferendis qui quos repellendus vero! Cupiditate, recusandae!</div>
                            </div>
                        </v-card-title>
                        <v-card-actions>
                            <v-btn flat color="orange">Share</v-btn>
                            <v-btn flat color="orange">Explore</v-btn>
                        </v-card-actions>
                    </v-card>
                </div>
                <div class="timeline-badge red">
                    <v-icon>more</v-icon>
                </div>
            </div>
            <div class="timeline-event">
                <div class="timeline-content">
                    <v-card>
                        <v-card-title primary-title>
                            <div>
                                <h3 class="headline mb-0">Event 3 title</h3>
                                <div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci aperiam blanditiis, cumque delectus deleniti earum facere, fugit hic ipsam iste iusto laboriosam nam perferendis qui quos repellendus vero! Cupiditate, recusandae!</div>
                            </div>
                        </v-card-title>
                        <v-card-actions>
                            <v-btn flat color="orange">Share</v-btn>
                            <v-btn flat color="orange">Explore</v-btn>
                        </v-card-actions>
                    </v-card>
                </div>
                <div class="timeline-badge blue white-text">
                    <v-icon>more</v-icon>
                </div>
            </div>
            <div class="timeline-event">
                <div class="timeline-content">
                    <v-card>
                        <v-card-title primary-title>
                            <div>
                                <h3 class="headline mb-0">Event 2 title</h3>
                                <div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci aperiam blanditiis, cumque delectus deleniti earum facere, fugit hic ipsam iste iusto laboriosam nam perferendis qui quos repellendus vero! Cupiditate, recusandae!</div>
                            </div>
                        </v-card-title>
                        <v-card-actions>
                            <v-btn flat color="orange">Share</v-btn>
                            <v-btn flat color="orange">Explore</v-btn>
                        </v-card-actions>
                    </v-card>
                </div>
                <div class="timeline-badge green">
                    <v-icon>language</v-icon>
                </div>
            </div>
            <div class="timeline-event">
                <div class="timeline-content">
                    <v-card>
                        <v-card-title primary-title>
                            <div>
                                <h3 class="headline mb-0">Event 4 title</h3>
                                <div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci aperiam blanditiis, cumque delectus deleniti earum facere, fugit hic ipsam iste iusto laboriosam nam perferendis qui quos repellendus vero! Cupiditate, recusandae!</div>
                            </div>
                        </v-card-title>
                        <v-card-actions>
                            <v-btn flat color="orange">Share</v-btn>
                            <v-btn flat color="orange">Explore</v-btn>
                        </v-card-actions>
                    </v-card>
                </div>
                <div class="timeline-badge blue">
                    <v-icon>more</v-icon>
                </div>
            </div>
        </div>
    </div>
</template>

<style>
    .timeline {
        position: relative;
    }

    .timeline .timeline-event {
        position: relative;
        padding-top: 5px;
        padding-bottom: 5px;
    }

    .timeline .timeline-event .timeline-content {
        position: relative;
        left: 70px;
    }

    .timeline .timeline-badge {
        display:block;
        position: absolute;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        top: calc(50% - 20px);
        left: calc(50%);
        text-align: center;
        cursor: default;
    }

    .timeline .timeline-event:before {
        display: block;
        content: "";
        width: 2px;
        height: calc(50% - 25px);
        position: absolute;
        background: #d2d2d2;
        top: 0;
        left: calc(50% + 20px);
    }

    .timeline .timeline-event:after {
        display: block;
        content: "";
        width: 2px;
        height: calc(50% - 25px);
        position: absolute;
        background: #d2d2d2;
        top: calc(50% + 25px);
        left: calc(50% + 20px);
    }

    .timeline .timeline-badge i {
        line-height: 40px;
    }
    .timeline .timeline-event:last-child::after {
        display: none;
    }
    .timeline .timeline-event:first-child::before {
        /*display: none;*/
    }

    .timeline .timeline-event .timeline-content {
        width: calc(50% - 80px);
    }

    .timeline .timeline-event:nth-child(even) .timeline-content {

    }
    .timeline .timeline-event:nth-child(odd) .timeline-content{
        left: calc(50% + 55px);
    }

    @media (max-width: 600px) {
        .timeline .timeline-event::before {
            left: 15px;
        }

        .timeline .timeline-event::after {
            left: 15px;
        }

        .timeline .timeline-badge {
            left: -5px;
        }

        .timeline .timeline-event:nth-child(odd) .timeline-content{
            left: 50px;
            width: calc(100% - 35px);
        }

        .timeline .timeline-event:nth-child(even) .timeline-content{
            left: 50px;
            width: calc(100% - 35px);
        }
    }

</style>

<script>
  export default {
    name: 'name',
    data () {
      return {
        data: 'example'
      }
    },
    mounted () {
      console.log('Mounted ok')
    }
  }
</script>
