import React from 'react'
import SideBar from './SideBar'

import {
    Drawer,
    DrawerClose,
    DrawerContent,
    DrawerDescription,
    DrawerFooter,
    DrawerHeader,
    DrawerTitle,
    DrawerTrigger,
  } from "../ui/drawertwo"


const Dashboard = () => {
  return (
    <Drawer >
        <DrawerTrigger>Ouvrir</DrawerTrigger>
        <DrawerContent>
            <SideBar/>
        </DrawerContent>
    </Drawer>


  )
}

export default Dashboard
