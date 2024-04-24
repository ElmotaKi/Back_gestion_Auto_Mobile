import React from "react";
import SideBar from "./SideBar";

import {
    Drawer,
    DrawerClose,
    DrawerContent,
    DrawerDescription,
    DrawerFooter,
    DrawerHeader,
    DrawerTitle,
    DrawerTrigger,
} from "../../ui/drawertwo";
import { Navigate, Outlet } from "react-router-dom";
import CustomAvatar from "./CustomAvatar";

const Layout = () => {
    if(!window.localStorage.getItem("token")){
        return <Navigate to="/" />;
    }
    return (
      <div className="flex ...">
        <div className="flex-none w-14 h-14">
        <Drawer>
                <DrawerTrigger>Ouvrir</DrawerTrigger>
                <DrawerContent>
                    <SideBar />
                </DrawerContent>
            </Drawer>
        </div>
        <div className="grow h-14 mt-20 ">
        <Outlet />
        </div>
        <div className="flex-none w-14 h-14 my-2">
            <CustomAvatar/>
        </div>
        </div>
       
    );
};

export default Layout;
