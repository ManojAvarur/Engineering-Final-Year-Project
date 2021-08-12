from os import path, listdir, mkdir, remove        

files_extension_to_move = ["srt", "vtt"]
files_to_be_moved = []

def move_srt_and_vtt_files( dir_name ):
    print("\n\n")
    for i in listdir( dir_name ):
        joined_path = path.join( dir_name, i)
        if path.isdir( joined_path ):
            move_srt_and_vtt_files( joined_path )
        else:
            if i.split(".")[-1] in files_extension_to_move:
                print( joined_path )
                files_to_be_moved.append( joined_path )



if __name__ == "__main__":
    CUR_DIR = path.dirname( __file__ )
    move_srt_and_vtt_files( CUR_DIR )
    ans = input("Are you sure you want to delete the files? [ y or n ] : ").lower()
    if ans in ["yes","y","1"]:
        for file in files_to_be_moved:
            folder_name = path.dirname( file )
            moved_files_dir_name = "SRT and VTT files"
            moved_files_dir = path.join( folder_name, moved_files_dir_name)

            if not path.isdir( moved_files_dir ):
                mkdir( moved_files_dir )

            with open( file, "r" ) as source_file:
                with open( path.join( moved_files_dir, file.split("\\")[-1] ), "w" ) as destination_file:
                    data = source_file.readlines()
                    destination_file.writelines( data )

            remove( file )

        input("Process completed successfully!\nPress Enter to exit.")
    else:
        input("File Deletion has been canceled!\nPress Enter to exit.")

                    
            